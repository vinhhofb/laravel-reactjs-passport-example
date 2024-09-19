import React, { useRef, useState } from 'react';
import Webcam from 'react-webcam';
import axios from 'axios';

const CaptureModel = () => {
  const webcamRef = useRef(null);
  const [imageSrc, setImageSrc] = useState(null);
  const [uploading, setUploading] = useState(false);
  const [uploadSuccess, setUploadSuccess] = useState(null);

  const capture = () => {
    if (webcamRef.current) {
      const image = webcamRef.current.getScreenshot();
      setImageSrc(image);
    }
  };

  const sendImageToApi = async () => {
    if (imageSrc) {
      setUploading(true);
      try {
        const token = localStorage.getItem('token');
        // Gửi ảnh dưới dạng Base64
        await axios.post(
          `${process.env.REACT_APP_API_URL}/api/upload-image`,
          {
            image: imageSrc, // Base64 image
          },
          {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          }
        );
        setUploadSuccess(true);
      } catch (error) {
        setUploadSuccess(false);
      } finally {
        setUploading(false);
      }
    }
  };
  

  return (
    <div className="flex flex-col items-center">
      {/* Webcam preview */}
      <Webcam
        audio={false}
        ref={webcamRef}
        screenshotFormat="image/jpeg"
        className="w-full h-64"
      />

      {/* Capture button */}
      <button
        onClick={capture}
        className="mt-4 bg-blue-500 text-white px-4 py-2 rounded"
      >
        Capture Image
      </button>

      {/* Display captured image */}
      {imageSrc && (
        <div className="mt-4">
          <img src={imageSrc} alt="Captured" />
        </div>
      )}

      {/* Upload button */}
      {imageSrc && (
        <button
          onClick={sendImageToApi}
          className="mt-4 bg-green-500 text-white px-4 py-2 rounded"
        >
          {uploading ? 'Uploading...' : 'Send Image'}
        </button>
      )}

      {/* Success message */}
      {uploadSuccess && <p className="text-green-500 mt-2">Image uploaded successfully!</p>}
      {uploadSuccess === false && <p className="text-red-500 mt-2">Upload failed. Try again.</p>}
    </div>
  );
};

export default CaptureModel;
