const express = require('express');
const app = express();
const port = 3000;

// Data from the database (replace this with actual database connection and query)
const alternatifData = [
  { kode_alternatif: 'A1', tahun: 2022, nama_alternatif: 'Adelia Rahmawati', kelas: 'XI AKL', total: 0.68913479819773, rank: 64 },
  { kode_alternatif: 'A2', tahun: 2024, nama_alternatif: 'Andrian Syawan Sofian', kelas: 'XI AKL', total: 0.7156994830584, rank: 53 },
  // ... other data
];

// Endpoint to get all alternatif data
app.get('/alternatif', (req, res) => {
  res.json(alternatifData);
});

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`);
});