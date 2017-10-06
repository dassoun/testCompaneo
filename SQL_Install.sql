-- DROP TABLE IF EXISTS teams;
CREATE sequence teams_seq;
CREATE TABLE teams (
  id integer DEFAULT nextval('teams_seq'),
  name character varying(250) DEFAULT NULL,
  PRIMARY KEY (id)
);

-- Create syntax for TABLE 'events'
-- DROP TABLE IF EXISTS events;
CREATE sequence events_seq;
CREATE TABLE events (
  id integer DEFAULT nextval('events_seq'),
  name character varying(250) NOT NULL,
  event_start_date DATE NOT NULL,
  event_end_date DATE NOT NULL,
  PRIMARY KEY (id)
);


-- Create syntax for TABLE 'matches'
-- DROP TABLE IF EXISTS matches;
CREATE sequence matches_seq;
CREATE TABLE matches (
  id integer NOT NULL DEFAULT nextval('matches_seq'),
  home_team_id integer NOT NULL,
  away_team_id integer NOT NULL,
  home_score integer NOT NULL,
  away_score integer NOT NULL,
  snitch integer NOT NULL,
  P integer DEFAULT NULL,
  Padj double precision DEFAULT NULL,
  SWIM double precision DEFAULT NULL,
  event_id integer NOT NULL,
  event_order integer DEFAULT NULL,
  PRIMARY KEY (id)
);

INSERT INTO teams (name) VALUES
('Paris'),
('Caen'),
('Rouen'),
('Lille'),
('Toulouse'),
('Nantes'),
('Strasbourg'),
('Juvisy'),
('Dijon'),
('Rennes'),
('St-Etienne'),
('Lyon');

INSERT INTO events
(name, event_start_date, event_end_date) 
VALUES 
('Event #1','2015-09-27','2015-09-28'),
('Event #2','2015-10-11','2015-10-12');

INSERT INTO matches 
(home_team_id, away_team_id, home_score, away_score, snitch, event_id, event_order) 
VALUES 
(1,5,200,100,2,1,1), -- A
(7,11,90,160,2,1,2),
(1,7,110,190,1,1,5),
(5,11,110,30,1,1,6),
(1,11,110,100,2,1,9),
(5,7,20,0,1,1,10),
(3,12,190,110,1,1,3), -- B
(9,8,190,0,1,1,4),
(3,9,10,70,1,1,7),
(12,8,50,110,1,1,8),
(3,8,190,30,2,1,11),
(12,9,120,100,2,1,12),

(5,12,180,190,1,1,13), -- 1/4
(3,7,190,170,2,1,14),
(11,8,0,50,2,1,15),
(9,1,140,180,1,1,16),

(5,7,50,120,2,1,17), -- 1/2
(8,1,40,140,1,1,18),

(7,1,20,100,2,1,19), -- F
(5,8,30,180,1,1,20), -- 3

(2,10,190,20,2,2,1), -- A
(6,8,10,190,1,2,2),
(2,6,20,180,2,2,5),
(10,8,170,40,1,2,6),
(2,8,50,90,1,2,9),
(10,6,90,200,1,2,10),
(4,12,140,90,1,2,3), -- B
(5,1,30,60,2,2,4),
(4,5,120,200,2,2,7),
(12,1,100,180,2,2,8),
(4,1,0,60,2,2,11),
(12,5,80,70,2,2,12),

(8,12,70,60,1,2,13), -- 1/4
(5,2,50,120,1,2,14),
(10,4,140,20,1,2,15),
(1,6,90,80,2,2,16),

(8,2,0,200,2,2,17), -- 1/2
(10,6,40,160,2,2,18),

(2,6,30,70,1,2,19), -- F
(8,10,170,60,1,2,20) -- 3
