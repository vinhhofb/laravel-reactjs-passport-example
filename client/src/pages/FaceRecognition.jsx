import React, { useEffect, useRef, useState } from 'react';
import * as faceapi from 'face-api.js';
import Webcam from 'react-webcam';
import axios from 'axios';

const FaceRecognition = ({status, setStatus, fetchUserData}) => {
  const [modelsLoaded, setModelsLoaded] = useState(false);
  const webcamRef = useRef(null);
  const canvasRef = useRef(null);
  const imageRef = useRef(null);
  const userAuth = JSON.parse(localStorage.getItem('user'));
  console.log(userAuth.user_image_models[0].file_name)
  useEffect(() => {
    const loadModels = async () => {
      const MODEL_URL = '/models';
      await faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL);
      await faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL);
      await faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL);
      setModelsLoaded(true);
    };

    const loadReferenceImage = async () => {
      const img = imageRef.current;

      if (img) {
        const detection = await faceapi.detectSingleFace(img, new faceapi.TinyFaceDetectorOptions())
          .withFaceLandmarks()
          .withFaceDescriptor();
          console.log(detection)
        if (detection) {
          img.descriptor = detection.descriptor;
        }
      }
    };

    loadModels().then(loadReferenceImage);
  }, []);

  useEffect(() => {
    const handleVideoOnPlay = async () => {
      if (!modelsLoaded) return;
      const intervalId = setInterval(async () => {
        if (webcamRef.current && webcamRef.current.video.readyState === 4) {
          const video = webcamRef.current.video;
          const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
            .withFaceLandmarks()
            .withFaceDescriptors();

          const resizedDetections = faceapi.resizeResults(detections, { width: video.videoWidth, height: video.videoHeight });
          canvasRef.current.getContext('2d').clearRect(0, 0, video.videoWidth, video.videoHeight);

          faceapi.draw.drawDetections(canvasRef.current, resizedDetections);
          faceapi.draw.drawFaceLandmarks(canvasRef.current, resizedDetections);

          if (imageRef.current && imageRef.current.descriptor) {
            const labeledFaceDescriptors = new faceapi.LabeledFaceDescriptors('label', [imageRef.current.descriptor]);
            const faceMatcher = new faceapi.FaceMatcher([labeledFaceDescriptors]);

            const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor));

            results.forEach((result, i) => {
              const box = resizedDetections[i].detection.box;
              const { label, distance } = result;
              const drawBox = new faceapi.draw.DrawBox(box, { label: `${label} (${Math.round(distance * 100) / 100})` });
              drawBox.draw(canvasRef.current);
              console.log(distance)
              if (distance < 0.2) {
                handleCheckIn()
                setStatus('Checkin Success')
                fetchUserData()
                clearInterval(intervalId);
              }else{
                setStatus('Please try again');
              }
            });
          }
        }
      }, 1000);

      return () => clearInterval(intervalId);
    };

    if (modelsLoaded) {
      handleVideoOnPlay();
    }
  }, [modelsLoaded]);

  const handleCheckIn = async () => {
    try {
      const token = localStorage.getItem('token');

      await axios.get(`${process.env.REACT_APP_API_URL}/api/checkin`, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      
    } catch (error) {
      console.error('Failed to fetch user data', error);
    }
  };

  return (
    <div style={{ position: 'relative' }}>
      <img ref={imageRef} src={`${process.env.REACT_APP_API_URL}/user-image-models/${userAuth.user_image_models[0].file_name}`} alt="Model" style={{ display: 'none' }} crossOrigin="anonymous" />
      <Webcam ref={webcamRef} />
      <canvas ref={canvasRef} style={{ position: 'absolute', top: 0, left: 0 }} />
      <p className="text-center">{status}</p>
    </div>
  );
};

export default FaceRecognition;
