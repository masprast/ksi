CREATE VIEW nr AS
SELECT AVG(Grade) AS 'rata-rata',
    KodeMK
FROM tnilai
WHERE KodeMK <> ""
GROUP BY KodeMK
SELECT NamaMataKuliah,
    'rata-rata'
FROM tmatakuliah
    JOIN nr on tmatakuliah.KodeMK = nr.KodeMK