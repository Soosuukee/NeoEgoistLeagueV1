INSERT INTO offer (team_id, player_id, amount)
SELECT t.id, p.id, o.amount
FROM (
    SELECT 'Ubers' AS team_name, 'Shoei Baro' AS player_name, 100000000 AS amount
    UNION ALL
    SELECT 'Ubers', 'Shoei Baro', 130000000
    UNION ALL
    SELECT 'Ubers', 'Shoei Baro', 150000000
    UNION ALL
    SELECT 'Bolos', 'Oliver Aiku', 15000000
    UNION ALL
    SELECT 'Bolos', 'Oliver Aiku', 27000000
    UNION ALL
    SELECT 'Ubers', 'Oliver Aiku', 38000000
    UNION ALL
    SELECT 'Ubers', 'Oliver Aiku', 60000000
    UNION ALL
    SELECT 'Kawasaki Breakerz', 'Rensuke Kunigami', 24000000
    UNION ALL
    SELECT 'RPB', 'Rensuke Kunigami', 47000000
    UNION ALL
    SELECT 'RBP', 'Rensuke Kunigami', 50000000
    UNION ALL
    SELECT 'Ajajax', 'Ryusei Shido', 20000000
    UNION ALL
    SELECT 'Ajajax', 'Ryusei Shido', 25000000
    UNION ALL
    SELECT 'Paris X Gen', 'Ryusei Shido', 100000000
    UNION ALL
    SELECT 'Paris X Gen', 'Tabito Karasu', 12000000
    UNION ALL
    SELECT 'Paris X Gen', 'Tabito Karasu', 24000000
    UNION ALL
    SELECT 'Paris X Gen', 'Tabito Karasu', 35000000
    UNION ALL
    SELECT 'FC Barcha', 'Eita Otoya', 9000000
    UNION ALL
    SELECT 'FC Barcha', 'Eita Otoya', 22000000
    UNION ALL
    SELECT 'FC Barcha', 'Eita Otoya', 42000000
    UNION ALL
    SELECT 'Urawa Rubies', 'Jyubei Aryu', 5000000
    UNION ALL
    SELECT 'Urawa Rubies', 'Jyubei Aryu', 25000000
    UNION ALL
    SELECT 'Marseille', 'Jyubei Aryu', 35000000
    UNION ALL
    SELECT 'Marseille', 'Jyubei Aryu', 45000000
    UNION ALL
    SELECT 'Manshine City', 'Seishiro Nagi', 88000000
    UNION ALL
    SELECT 'Manshine City', 'Seishiro Nagi', 43000000
    UNION ALL
    SELECT 'Manshine City', 'Seishiro Nagi', 40000000
    UNION ALL
    SELECT 'Ars', 'Reo Mikage', 40000000
    UNION ALL
    SELECT 'Ars', 'Reo Mikage', 36000000
    UNION ALL
    SELECT 'Ars', 'Reo Mikage', 34000000
    UNION ALL
    SELECT 'Manshine City', 'Hyoma Chigiri', 30000000
    UNION ALL
    SELECT 'Manshine City', 'Hyoma Chigiri', 50000000
    UNION ALL
    SELECT 'Manshine City', 'Hyoma Chigiri', 55000000
    UNION ALL
    SELECT 'Ajajax', 'Kenyu Yukimiya', 29000000
    UNION ALL
    SELECT 'Ajajax', 'Kenyu Yukimiya', 36000000
    UNION ALL
    SELECT 'Bastard Munchen', 'Gin Gagamaru', 28000000
    UNION ALL
    SELECT 'Bastard Munchen', 'Gin Gagamaru', 32000000
    UNION ALL
    SELECT 'Bastard Munchen', 'Ranze Kurona', 24000000
    UNION ALL
    SELECT 'Bastard Munchen', 'Ranze Kurona', 34000000
    UNION ALL
    SELECT 'Ubers', 'Ikki Niko', 23500000
    UNION ALL
    SELECT 'Ubers', 'Ikki Niko', 30000000
    UNION ALL
    SELECT 'Ubers', 'Ikki Niko', 40000000
    UNION ALL
    SELECT 'Ubers', 'Shuto Sendo', 17500000
    UNION ALL
    SELECT 'FC Barcha', 'Miroku Darai', 15000000
    UNION ALL
    SELECT 'FC Barcha', 'Haru Hayate', 15000000
    UNION ALL
    SELECT 'Bastard Munchen', 'Yo Hiori', 20000000
    UNION ALL
    SELECT 'Bastard Munchen', 'Jingo Raichi', 18000000
    UNION ALL
    SELECT 'Paris X Gen', 'Aoshi Tokimitsu', 10000000
    UNION ALL
    SELECT 'Paris X Gen', 'Aoshi Tokimitsu', 23000000
    UNION ALL
    SELECT 'Paris X Gen', 'Zantetsu Tsurugi', 8000000
    UNION ALL
    SELECT 'Paris X Gen', 'Zantetsu Tsurugi', 23000000
    UNION ALL
    SELECT 'Manshine City', 'Kazuma Nio', 6000000
    UNION ALL
    SELECT 'Manshine City', 'Reiji Hiiragi', 6000000
    UNION ALL
    SELECT 'Ubers', 'Gen Fukaku', 5000000
    UNION ALL
    SELECT 'Manshine City', 'Junichi Wanima', 4000000
    UNION ALL
    SELECT 'Manshine City', 'Junichi Wanima', 4000000
    UNION ALL
    SELECT 'Manshine City', 'Junichi Wanima', 8200000
    UNION ALL
    SELECT 'Paris X Gen', 'Nijiro Nanase', 3000000  
    UNION ALL
    SELECT 'Paris X Gen', 'Nijiro Nanase', 16000000   
    UNION ALL
    SELECT 'FC Barcha', 'Aiki Himizu', 7000000
    UNION ALL
    SELECT 'FC Barcha', 'Shizuka Haiji', 6000000
    UNION ALL
    SELECT 'Paris X Gen', 'Kento Cho', 5000000  
    UNION ALL
    SELECT 'FC Barcha', 'Itsuki Wakatsuki', 5000000
    UNION ALL
    SELECT 'FC Barcha', 'Teru Kitsunezato', 4000000
    UNION ALL
    SELECT 'Manshine City', 'Hajime Nishioka', 3000000
    ) AS o
JOIN team t ON t.name = o.team_name
JOIN player p ON p.name = o.player_name;
