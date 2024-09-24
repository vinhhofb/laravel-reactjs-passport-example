import { Controller } from 'react-hook-form'; // Import Controller
import { Autocomplete } from '@mui/material';
import TextField from '@mui/material/TextField';

const NationalitySelect = ({ name, control, nationalities, loading, errors }) => {
  return (
    <Controller
      name={name}
      control={control}
      render={({ field: { onChange, onBlur, value } }) => (
        <Autocomplete
          onChange={(event, newValue) => {
            onChange(newValue?.name); // Set the selected nationality name
          }}
          onBlur={onBlur}
          options={nationalities}
          getOptionLabel={(option) => option.name}
          value={nationalities.find(n => n.name === value) || null} // Set the current value
          renderInput={(params) => (
            <TextField
              {...params}
              variant="outlined"
              error={Boolean(errors[name])}
              helperText={errors[name] ? errors[name].message : ''}
            />
          )}
        />
      )}
    />
  );
};

export default NationalitySelect;
