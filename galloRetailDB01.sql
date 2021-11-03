ALTER TABLE `users`
  ADD KEY `email` (`email`);


CREATE TABLE `products` (
`product_id` int(11) NOT NULL,
`product_name` varchar(255) NOT NULL,
`product_image` varchar(255) DEFAULT NULL,
`product_description` text,
`product_price` decimal(10,2) NOT NULL DEFAULT '0',
`product_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `products`
ADD PRIMARY KEY (`product_id`),
ADD KEY `name` (`product_name`),
ADD KEY `category` (`product_category`);

ALTER TABLE `products`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `orders` (
`order_id` int(11) NOT NULL,
`order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`order_name` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`order_cc` varchar(255) NOT NULL,
`order_address` varchar(255) NOT NULL,
`order_phone` varchar(255) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `orders`
ADD PRIMARY KEY (`order_id`,`email`),
ADD KEY `name` (`order_name`),
ADD KEY `order_date` (`order_date`);

ALTER TABLE `orders`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `orders_items` (
`order_id` int(11) NOT NULL,
`product_id` int(11) NOT NULL,
`quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `orders_items`
ADD PRIMARY KEY (`order_id`,`product_id`);

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_description`, `product_price`, `product_category`) VALUES
(1, 'Duck Foie Gras – Micuit', 'DuckFoieGras.jpg', 'A specialty creation made from the best duck foie gras, delicately crafted by French brand Rougie.', '98.25','specialty'),
(2, 'Balsamic Vinegar Of Reggio Emilia Silver Seal', 'BalsamicVinegar.jpg', 'One of the rarest Balsamics, this vinegar has been aged in barrels for over 50 years.', '157.50','specialty'),
(3, 'Special Reserve Russian Osetra Caviar - Malossol, Farm Raised', 'Caviar.jpg', 'This exceptional caviar delivers the glossiest, largest and most flavorful eggs, of superb quality.', '181.25','specialty'),
(4, 'Royal Mustard with Cognac', 'Mustard.jpg', 'A luxurious medium-grain French mustard flavored with cognac, this is perfect to add to roasted meats and on sandwiches', '31.75','specialty'),
(5, 'Hawaiian Black Lava Sea Salt – Coarse', 'BlackSalt.jpg', 'Premium sea salt from Hawaii mixed with Coconut shell charcoal.', '21.00','specialty'),
(6, 'Pont L\'Eveque AOC', 'PontCheese.jpg', 'An AOC controlled cheese, Pont L\'Eveque\'s manufacture is bound to strict quality control and very particular processes.', '12.25','cheese'),
(7, 'Camembert Le Bocage', 'Camembert.jpg', 'A lush, creamy and buttery cow\'s milk cheese, this Camembert from Normandy has a mild flavor that finishes smoothly on the palate.', '7.75','cheese'),
(8, 'Brie De Meaux – 50%', 'Brie.jpg', 'Arguably the most popular of French cheeses, this Brie has a velvety taste and bears the AOC standard, undisputable mark of quality.', '131.75','cheese'),
(9, 'Fresh Smoked Mozzarella', 'SmokedMozzarella.jpg', 'Fresh smoked mozzarella made from scratch in an Italian market, smoked to enhance its natural flavor', '7.75','cheese'),
(10, 'Fiscalini 18 Month Farmstead Cheddar', 'Cheddar.jpg', 'A delicious extra mature cheddar cheese from California.', '28.25','cheese'),
(11, 'Shropshire Blue Cheese', 'BlueCheese.jpg', 'A sharp blue cheese similar to Stilton.', '23.25','cheese'),
(12, 'Wagyu Beef Rib Eye Steaks MS5/6', 'RibEye.jpg', 'From Australia by Greg Norman Signature', '53.75','meat'),
(13, 'Whole Rabbit', 'Rabbit.jpg', 'From United States by Pel-Freez', '39.00','meat'),
(14, 'Prosciutto Di Parma – Sliced', 'Prosciutto.jpg', 'From Italy by Vill Antica', '17.50','meat'),
(15, 'Saucisson Sec Sausage', 'Sausage.jpg', 'From United States by Terroirs d\'Antan', '22.75','meat'),
(16, 'Sakura Duroc Pork 8-Bone Rack', 'Pork.jpg', 'A generously-sized rib rack with exceptional meat quality, from Midwest-raised Sakura pigs.', '98.50','meat'),
(17, 'Lamb 7-8 Frenched Rib Racks, Frozen', 'Lamb.jpg', 'Our deliciously juicy and tender New Zealand grass-fed rack of lamb has a showstopping Frenched bone.', '38.00','meat'),
(18, 'French Almond Macaroons', 'Macaroons.jpg', 'Light and airy cloud-like cookies made with almond flour and filled with unexpected flavors.', '9.25','snack'),
(19, 'French Opera Cake – Frozen', 'OperaCake.jpg', 'A soft and spongy cookie sandwich filled with buttery cream and covered with chocolate ganache.', '49.00','snack'),
(20, 'Spanish Marcona Almonds - Fried and Salted', 'Almonds.jpg', 'Totally natural, totally sweet, these Marcona almonds are lightly fried in oil and salted.', '23.50','snack'),
(21, '100% Butter French Curved Croissants - 3.5 oz, Unbaked', 'Croissants.jpg', 'Shapely shells of golden pastry, these croissants are filled with all the warmth of a French patisserie.', '49.75','snack'),
(22, 'Pain au Chocolat', 'ChocolateCroissant.jpg', 'Flaky, buttery and indulgent chocolate-filled French croissants at home!', '142.25','snack'),
(23, 'Fig and Almond Cake', 'Cake.jpg', 'A traditional, all-natural Spanish treat of sweet sun-dried Spanish figs pressed with plump almonds to serve with cheese.', '3.25','snack'),
(24, 'Anova Sous Vide', 'SousVide.jpg', 'Precision cooker heats and circulates water in your pot, evenly cooking food to a precise internal temperature', '214.95','tool'),
(25, 'Shun Kaji 11-Piece Knife Block Set', 'KnifeSet.jpg', 'Inspired by centuries-old samurai sword–making techniques, the blades’ construction creates a supersharp cutting edge.', '2372.00','tool'),
(26, 'Antonini Olivewood Cheese Knives Set', 'CheeseKnife.jpg', 'Handles are carved from aged olivewood, a Mediterranean hardwood prized for its rich coloration and intricate grain.', '59.95','tool');
