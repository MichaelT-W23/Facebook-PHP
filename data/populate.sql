use facebook_php_db;

INSERT INTO users (name, school, birthday, hometown) 
VALUES 
('Michael Totaro', 'UNCW', '2002-01-20', 'Charlotte, NC'),
('Ross Ulbricht', 'UTD / Penn State', '1984-03-27', 'Austin, TX'),
('Mark Zuckerberg', 'Harvard', '1984-05-14', 'White Plains, NY');

INSERT INTO posts (user_id, likes, date_posted, content)
VALUES
(1, 45, '2011-11-11', 'Programming is life.'),
(1, 120, '1738-04-05', 'It''s lit'),
(2, 120, '2011-04-20', 'Man I''m the plug fr fr'),
(2, 95, '2013-08-01', 'Oh shi I''m being arrested at the library'),
(2, 555, '2025-01-21', '* In Scottish Accent * FREEEEDDDDOOOOOMMMMMMM'),
(3, 69, '2024-01-31', 'Why is Josh Hawley yelling at me?'),
(3, 310, '2025-02-09', 'Guys Michael is stealing my website idea, sue him.'),
(3, 230, '2004-02-04', 'I just made a website! Everyone check it out');

