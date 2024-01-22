SELECT NamaMataKuliah
FROM tmatakuliah
    JOIN tnilai ON tmatakuliah.KodeMK = tnilai.KodeMK
WHERE AVG(Grade) > 75