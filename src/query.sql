INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'Left Back'
WHERE( p.name LIKE '%Chapa%' 
   OR p.name LIKE '%So%'
   OR p.name LIKE '%Miroku%'
   OR p.name LIKE '%Sachs%'
  )
   AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );
   
INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'Sideback'
WHERE( p.name LIKE '%Bachira%' 
   OR p.name LIKE '%Otoya%'
   OR p.name LIKE '%Yukimiya%'
   OR p.name LIKE '%Teppei%'
   OR p.name LIKE '%Noel%'
   OR p.name LIKE '%Igarashi%'
   OR p.name LIKE '%Hiori%'
   OR p.name LIKE '%Chapa%' 
   OR p.name LIKE '%So%'
   OR p.name LIKE '%Miroku%'
   OR p.name LIKE '%Sachs%'
   OR p.name LIKE '%Hyoma%'
   OR p.name LIKE '%Bos%'

  )
   AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );
   
INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'Right Back'
WHERE( p.name LIKE '%Hyoma%' 
   OR p.name LIKE '%Bos%'
   OR p.name LIKE '%Teppei%'
  )
   AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );
  INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'WingBack'
WHERE( p.name LIKE '%Kurona%' OR p.name LIKE '%Nijiro%' OR p.name LIKE '%Tsurugi%' OR p.name LIKE '%Arthur%' OR p.name LIKE '%Swift%' OR p.name LIKE '%Rico%' OR p.name LIKE '%Abdi%')
 AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );
   INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'Right Wing-Back'
WHERE( p.name LIKE '%Rico%' OR p.name LIKE '%Swift%')
 AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );
   INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'Left Wing-Back'
WHERE( p.name LIKE '%Abdi%' OR p.name LIKE '%Arthur%')
 AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );
   INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'Defensive Midfielder'
WHERE( p.name LIKE '%Mikage%' OR p.name LIKE '%Driver%' OR p.name LIKE '%Karasu%' OR p.name LIKE '%Tokimitsu%' OR p.name LIKE '%Kunigami%' OR p.name LIKE '%Raichi%' OR p.name LIKE '%Noel%' OR p.name LIKE '%Ali%' OR p.name LIKE '%Espesso%' OR p.name LIKE '%Wakatsuki%'OR p.name LIKE '%Pedro%' OR p.name LIKE '%Drago%' OR p.name LIKE '%Ikki%')
 AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );
   INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'DF'
WHERE( p.name LIKE '%Michelin%' OR p.name LIKE '%Gabon%' )
 AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );

   INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'MF'
WHERE( p.name LIKE '%Peron%' OR p.name LIKE '%Drago%' OR p.name LIKE '%Tokimitsu%' OR p.name LIKE '%Chevalier%' OR p.name LIKE '%Gomez%' OR p.name LIKE '%Picasso%' OR p.name LIKE '%Igor%' OR p.name LIKE '%Gesner%' OR p.name LIKE '%Drago%' OR p.name LIKE '%Peron%')
 AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );

     INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'Offensive Midfielder'
WHERE( p.name LIKE '%Isagi%' OR p.name LIKE '%Benedict%'OR p.name LIKE '%Ikki%' OR p.name LIKE '%Yukimiya%'OR p.name LIKE '%Hiori%'OR p.name LIKE '%Ness%' OR p.name LIKE '%Mikage%' OR p.name LIKE '%Nagi%')
 AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );
     INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'Central Midfielder'
WHERE( p.name LIKE '%Kunigami%' OR p.name LIKE '%Jingo%' OR p.name LIKE '%Mikage%' OR p.name LIKE '%Lorenzo%')
 AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );
   INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'Right Wing'
WHERE( p.name LIKE '%Kitsunezato%' OR p.name LIKE '%Otoya%'OR p.name LIKE '%Tsurugi%' OR p.name LIKE '%Hiori%' OR p.name LIKE '%Nagi%')
 AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );
   INSERT INTO player_position (player_id, position_id)
SELECT p.id, pos.id
FROM player p
JOIN position pos ON pos.name = 'Left Wing'
WHERE( p.name LIKE '%Chigiri%' OR p.name LIKE '%Nanase%'OR p.name LIKE '%Kento%' OR p.name LIKE '%Hiori%' OR p.name LIKE '%Yukimiya%' OR p.name LIKE '%Bachira%' OR p.name LIKE '%Ignacio%')
 AND NOT EXISTS (
    SELECT 1
    FROM player_position pp
    WHERE pp.player_id = p.id
    AND pp.position_id = pos.id
  );