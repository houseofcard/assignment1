CREATE TABLE stainedwindows (
	id int(11) NOT NULL,
	name varchar(256) NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO stainedwindows (id, name) VALUES
	(1, 'Astrological'),
	(2, 'Coloured Tree'),
	(3, 'Gothic'),
	(4, 'Red Plant'),
	(5, 'Religious');

	
CREATE TABLE typeavailable (
	id int(11) NOT NULL,
	product_id int(11) NOT NULL,
	name varchar(512) NOT NULL,
	price decimal(10,2) NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO typeavailable (id, product_id, name, price) VALUES
		(1, 1, 'Small', '229.99'),
		(2, 1, 'Medium', '239.99'),
		(3, 1, 'Large', '249.99'),	
		(4, 2, 'Medium', '248.99'),
		(5, 2, 'Large', '259.99'),
		(6, 2, 'X-Large', '269.99'),
		(7, 3, 'Small', '229.99'),
		(8, 3, 'Medium', '259.99'),
		(9, 3, 'Large', '279.99'),	
		(10, 4, 'Medium', '249.99'),
		(11, 4, 'Large', '269.99'),
		(12, 4, 'X-Large', '289.99'),
		(13, 5, 'Small', '346.99'),
		(14, 5, 'Medium', '364.99'),
		(15, 5, 'Large', '449.99');	
