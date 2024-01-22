SELECT NamaMahasiswa AS 'Mahasiswa'
FROM tmahasiswa
    JOIN tnilai ON tmahasiswa.NIRM = tnilai.NIRM
WHERE (
        SELECT KodeMK
        FROM tnilai
            JOIN tmatakuliah ON tnilai.KodeMK = tmatakuliah.KodeMK
        WHERE tmatakuliah = "Matematika"
            OR tmatakuliah = "Aljabar"
    )