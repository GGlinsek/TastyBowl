-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 07:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tastybowl_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `name`) VALUES
(7, 'beef'),
(8, 'beef'),
(9, 'onion'),
(10, 'garlic'),
(11, 'tomato'),
(12, 'potato'),
(13, 'carrot'),
(14, 'salt'),
(15, 'pepper'),
(16, 'olive oil'),
(17, 'butter'),
(18, 'flour'),
(19, 'sugar'),
(20, 'milk'),
(21, 'eggs'),
(22, 'vanilla extract'),
(23, 'baking powder'),
(24, 'cinnamon'),
(25, 'lemon juice'),
(26, 'honey'),
(27, 'soy sauce'),
(28, 'ginger'),
(29, 'rice'),
(30, 'noodles'),
(31, 'chicken'),
(32, 'bell pepper'),
(33, 'corn'),
(34, 'cheese'),
(35, 'parsley'),
(36, 'thyme'),
(37, 'oregano');

-- --------------------------------------------------------

--
-- Table structure for table `recipeingredients`
--

CREATE TABLE `recipeingredients` (
  `recipe_ingredient_id` bigint(20) UNSIGNED NOT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `quantity_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `recipeingredients`
--

INSERT INTO `recipeingredients` (`recipe_ingredient_id`, `recipe_id`, `ingredient_id`, `quantity`, `quantity_type`) VALUES
(8, 25, 11, 4, 'pieces'),
(9, 25, 9, 1, 'piece'),
(10, 25, 14, 1, 'tsp'),
(11, 25, 15, 1, 'tsp'),
(12, 25, 16, 2, 'tbsp'),
(13, 24, 7, 300, 'g'),
(14, 24, 10, 2, 'cloves'),
(15, 24, 9, 1, 'piece'),
(16, 24, 16, 1, 'tbsp'),
(17, 24, 32, 1, 'piece'),
(18, 26, 12, 500, 'g'),
(19, 26, 17, 50, 'g'),
(20, 26, 20, 100, 'ml'),
(21, 26, 14, 1, 'tsp'),
(22, 26, 15, 1, 'tsp'),
(23, 27, 17, 150, 'g'),
(24, 27, 19, 200, 'g'),
(25, 27, 21, 2, 'pieces'),
(26, 27, 22, 1, 'tsp'),
(27, 27, 23, 1, 'tsp'),
(28, 27, 34, 200, 'g'),
(29, 28, 31, 2, 'pieces'),
(30, 28, 9, 1, 'piece'),
(31, 28, 10, 2, 'cloves'),
(32, 28, 13, 2, 'pieces'),
(33, 28, 15, 1, 'tsp'),
(34, 28, 36, 1, 'tsp'),
(35, 29, 18, 200, 'g'),
(36, 29, 20, 300, 'ml'),
(37, 29, 21, 2, 'pieces'),
(38, 29, 17, 20, 'g'),
(39, 29, 17, 20, 'g'),
(40, 30, 27, 300, 'g'),
(41, 30, 10, 3, 'cloves'),
(42, 30, 14, 1, 'tsp'),
(43, 30, 25, 1, 'tbsp'),
(44, 31, 30, 250, 'g'),
(45, 31, 21, 2, 'pieces'),
(46, 31, 17, 50, 'g'),
(47, 31, 19, 50, 'g'),
(48, 31, 34, 50, 'g'),
(49, 32, 31, 1, 'whole'),
(50, 32, 10, 4, 'cloves'),
(51, 32, 25, 1, 'tbsp'),
(52, 32, 24, 1, 'tsp'),
(53, 32, 15, 1, 'tsp'),
(54, 33, 32, 1, 'piece'),
(55, 33, 33, 1, 'piece'),
(56, 33, 9, 1, 'piece'),
(57, 33, 27, 2, 'cloves'),
(58, 33, 28, 1, 'tsp'),
(59, 34, 33, 2, 'cups'),
(60, 34, 13, 1, 'can'),
(61, 34, 18, 1, 'box'),
(62, 34, 17, 1, 'cup'),
(63, 34, 34, 1, 'cup'),
(64, 35, 12, 1, 'kg'),
(65, 35, 17, 100, 'g'),
(66, 35, 20, 250, 'ml'),
(67, 35, 27, 2, 'cloves');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  `creation_date` date NOT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `user_id`, `title`, `description`, `instructions`, `creation_date`, `image`) VALUES
(24, 10, 'Beef Stir-Fry', 'A delicious and quick beef stir-fry', '1. Heat olive oil in a pan. \n2. Sauté beef until browned. \n3. Add garlic, ginger, and onion. \n4. Stir-fry for 2 minutes. \n5. Add bell pepper, carrot, and soy sauce. \n6. Cook for another 3 minutes. \n7. Serve hot with rice or noodles.', '2023-05-29', 'recept24.jpg'),
(25, 10, 'Tomato Soup', 'A comforting and flavorful tomato soup', '1. Heat olive oil in a pot. \n2. Sauté onions and garlic until softened. \n3. Add tomatoes and cook for 5 minutes. \n4. Season with salt, pepper, and basil. \n5. Simmer for 20 minutes. \n6. Serve hot with bread or croutons.', '2023-05-29', 'recept25.jpg'),
(26, 10, 'Mashed Potatoes', 'Creamy and smooth mashed potatoes', '1. Boil peeled potatoes until tender. \n2. Drain water and mash potatoes. \n3. Add butter, milk, salt, and pepper. \n4. Mash until smooth and creamy. \n5. Serve hot as a side dish.', '2023-05-29', 'recept26.jpg'),
(27, 10, 'Chocolate Chip Cookies', 'Classic homemade chocolate chip cookies', '1. Preheat oven to 180°C (350°F). \n2. In a bowl, cream butter and sugars. \n3. Beat in eggs and vanilla extract. \n4. In a separate bowl, mix flour, baking powder, and salt. \n5. Gradually add the dry ingredients to the butter mixture. \n6. Stir in chocolate chips. \n7. Drop spoonfuls of dough onto a baking sheet. \n8. Bake for 10-12 minutes or until golden brown. \n9. Cool on wire racks.', '2023-05-29', 'recept27.jpg'),
(28, 10, 'Chicken Noodle Soup', 'Hearty and comforting chicken noodle soup', '1. In a pot, bring chicken broth to a boil. \n2. Add diced chicken, chopped onion, and minced garlic. \n3. Simmer for 10 minutes. \n4. Add sliced carrots and celery. \n5. Cook for another 10 minutes. \n6. Season with salt, pepper, and thyme. \n7. Add cooked egg noodles. \n8. Simmer for 5 minutes. \n9. Serve hot.', '2023-05-29', 'recept28.jpg'),
(29, 10, 'Classic Pancakes', 'Fluffy and delicious pancakes', '1. In a bowl, whisk together flour, sugar, baking powder, and salt. \n2. In a separate bowl, whisk milk, eggs, and melted butter. \n3. Pour the wet ingredients into the dry ingredients. \n4. Stir until just combined (batter may be lumpy). \n5. Preheat a non-stick pan over medium heat. \n6. Pour 1/4 cup of batter onto the pan for each pancake. \n7. Cook until bubbles form on the surface, then flip and cook the other side. \n8. Serve hot with maple syrup or your favorite toppings.', '2023-05-29', 'recept29.jpg'),
(30, 10, 'Garlic Butter Shrimp', 'Juicy and flavorful garlic butter shrimp', '1. In a pan, melt butter over medium heat. \n2. Add minced garlic and cook until fragrant. \n3. Add shrimp and cook until pink and opaque. \n4. Season with salt, pepper, and lemon juice. \n5. Cook for an additional 1-2 minutes. \n6. Serve hot with rice or pasta.', '2023-05-29', 'recept30.jpg'),
(31, 10, 'Creamy Pasta Carbonara', 'Rich and indulgent pasta carbonara', '1. Cook pasta according to package instructions. \n2. In a bowl, whisk together eggs, grated cheese, salt, and pepper. \n3. In a pan, fry bacon until crispy. \n4. Remove bacon from pan, leaving the drippings. \n5. Add minced garlic and cook until fragrant. \n6. Drain cooked pasta and add it to the pan. \n7. Remove pan from heat and add the egg mixture. \n8. Stir quickly to coat the pasta and cook the eggs. \n9. Crumble the bacon and sprinkle it over the pasta. \n10. Serve hot with additional grated cheese.', '2023-05-29', 'recept31.jpg'),
(32, 10, 'Lemon Garlic Roasted Chicken', 'Juicy and flavorful roasted chicken', '1. Preheat oven to 200°C (400°F). \n2. In a small bowl, mix melted butter, minced garlic, lemon zest, and lemon juice. \n3. Season the chicken with salt, pepper, and paprika. \n4. Rub the butter mixture all over the chicken. \n5. Place the chicken on a baking sheet or roasting pan. \n6. Roast for 1 hour or until the internal temperature reaches 75°C (165°F). \n7. Let the chicken rest for 10 minutes before serving.', '2023-05-29', 'recept32.jpg'),
(33, 10, 'Vegetable Stir-Fry', 'Quick and healthy vegetable stir-fry', '1. Heat oil in a wok or large skillet over high heat. \n2. Add sliced bell peppers, sliced carrots, and chopped onion. \n3. Stir-fry for 3-4 minutes until vegetables are tender-crisp. \n4. Add minced garlic and grated ginger. \n5. Stir-fry for an additional 1 minute. \n6. In a small bowl, whisk together soy sauce, honey, and cornstarch. \n7. Pour the sauce over the vegetables and stir-fry for another 1-2 minutes until the sauce thickens. \n8. Serve hot over rice or noodles.', '2023-05-29', 'recept33.jpg'),
(34, 10, 'Cheesy Corn Casserole', 'Delicious and creamy corn casserole', '1. Preheat oven to 180°C (350°F). \n2. In a bowl, mix together corn, cream-style corn, cornbread mix, melted butter, sour cream, beaten eggs, and shredded cheese. \n3. Pour the mixture into a greased baking dish. \n4. Bake for 45-50 minutes or until golden brown and set. \n5. Let it cool for a few minutes before serving.', '2023-05-29', 'recept34.jpg'),
(35, 10, 'Creamy Garlic Mashed Potatoes', 'Smooth and flavorful mashed potatoes', '1. Peel and dice potatoes. \n2. Boil potatoes in salted water until tender. \n3. Drain the potatoes and return them to the pot. \n4. In a small saucepan, melt butter over medium heat. \n5. Add minced garlic and cook until fragrant. \n6. Pour the garlic butter over the potatoes. \n7. Mash the potatoes until smooth and creamy. \n8. Stir in milk, sour cream, salt, and pepper. \n9. Adjust seasonings to taste. \n10. Serve hot.', '2023-05-29', 'recept35.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `birth_date` date DEFAULT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `registration_date`, `birth_date`, `admin`) VALUES
(10, 'admin', 'admin@admin', '$2y$10$1paesnz9JaCz2Iv5hW3vNe1e55txgwlmZpD.EsQjchl9S2i5IQv2C', '2023-05-29', '2023-05-02', 1),
(24, 'AnaBanana', 'ana.banana@gmail.com', '$2y$10$gXpOxBpONUG3xejLCF85N.MTJPKp03l8m0tHD5FSDWjsRtgi/jbzq', '2023-05-30', '1998-01-07', 0),
(25, 'jan123', 'jannovak1@hotmail.com', '$2y$10$/SsOGYyCijQGCXxc2uT70.13KbmvV0bCjlYJQs9Fgy6Fsx7lPaPee', '2023-05-30', '2007-06-14', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_id`),
  ADD UNIQUE KEY `ingredient_id` (`ingredient_id`);

--
-- Indexes for table `recipeingredients`
--
ALTER TABLE `recipeingredients`
  ADD PRIMARY KEY (`recipe_ingredient_id`),
  ADD UNIQUE KEY `recipe_ingredient_id` (`recipe_ingredient_id`),
  ADD KEY `pk_recipeingredients_ingredient` (`ingredient_id`),
  ADD KEY `pk_recipeingredients_recipe` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD UNIQUE KEY `recipe_id` (`recipe_id`),
  ADD UNIQUE KEY `image` (`image`),
  ADD KEY `recipes_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredient_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `recipeingredients`
--
ALTER TABLE `recipeingredients`
  MODIFY `recipe_ingredient_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipeingredients`
--
ALTER TABLE `recipeingredients`
  ADD CONSTRAINT `pk_recipeingredients_ingredient` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`ingredient_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pk_recipeingredients_recipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
