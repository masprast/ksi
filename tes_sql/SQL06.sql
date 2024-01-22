SELECT NamaMataKuliah,
    MAX(COUNT(DISTINCT NIRM)) AS jumlah
FROM tmatakuliah
    JOIN tnilai ON tmatakuliah.KodeMK = tnilai.KodeMK