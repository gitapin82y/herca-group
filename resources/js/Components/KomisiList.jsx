import React, { useState, useEffect } from 'react';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';


const KomisiData = () => {
  const [komisiData, setKomisiData] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    // Fetching the komisi data from the Laravel API
    axios
      .get('http://127.0.0.1:8080/komisi')  // Replace with your actual Laravel API URL
      .then((response) => {
        setKomisiData(response.data.data);
        setLoading(false);
      })
      .catch((err) => {
        setError('Failed to fetch data');
        setLoading(false);
      });
  }, []);

  if (loading) {
    return <div>Loading...</div>;
  }

  if (error) {
    return <div>{error}</div>;
  }

  return (
    <div className="container pt-0 p-5">
      <h1>Komisi Data</h1>
      <table className="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Marketing</th>
            <th>Bulan</th>
            <th>Omzet</th>
            <th>Komisi (%)</th>
            <th>Komisi Nominal</th>
          </tr>
        </thead>
        <tbody>
          {komisiData.map((item, index) => (
            <tr key={index}>
              <td>{item.marketing}</td>
              <td>{item.bulan}</td>
              <td>{item.omzet}</td>
              <td>{item.komisi_persen}%</td>
              <td>{item.komisi_nominal}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default KomisiData;
