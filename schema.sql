
CREATE TABLE `category` (
`category_id` int primary key,
`category_name` varchar(30) not null
);

CREATE TABLE `region` (
`region_id` int primary key,
`name` varchar(30) not null,
`description` varchar(100) not null
);

CREATE TABLE `customer` (
`customer_id` int primary key,
`name` varchar(30) not null,
`email` varchar(30) not null,
`phone_number` varchar(30) not null,
`address` varchar(30) not null, 
`account_name` varchar(30) unique not null,
`account_password` varchar(30) not null,
`product_count` int,
`customer_region` int not null,
FOREIGN KEY (`customer_region`) REFERENCES `region`(`region_id`)
);

CREATE TABLE `product` (
`product_id` int primary key,
`owner` int not null,
`product_name` varchar(30) not null,
`product_weight` int not null,
`product_category` int not null,
`product_quantity` int not null,
`product_color` varchar(30) not null,
`product_cost` int not null,
`product_description` varchar(100) not null,
`image_link` varchar(50) not null,
FOREIGN KEY (`product_category`) REFERENCES `category`(`category_id`),
FOREIGN KEY (`owner`) REFERENCES `customer`(`customer_id`)
);

CREATE TABLE `employee`(
`employee_id` int primary key,
`employee_name` varchar(30) not null,
`phone_number` varchar(30) not null,
`birth_date` varchar(30) not null,
`email` varchar(30) not null,
`product_categories` int not null,
`employee_region` int not null,
FOREIGN KEY (`employee_region`) REFERENCES `region`(`region_id`),
FOREIGN KEY (`product_categories`) REFERENCES `category`(`category_id`)
);

CREATE TABLE `warehouse` (
`warehouse_id` int primary key,
`warehouse_name` varchar(30) not null,
`region_id` int unique,
`description` varchar(100) not null,
`address` varchar(30) not null,
`manager_name` varchar(30) not null,
`manager_email` varchar(30) not null,
`manager_phone` varchar(30) not null,
FOREIGN KEY (`region_id`) REFERENCES `region`(`region_id`)
);

CREATE TABLE `warehouse_product`(
`product_id` int unique,
`product_stock` int not null,
`product_status` varchar(30) not null,
`refill_point` int not null,
`refill_date` varchar(30),
`max_products` int not null,
`warehouse_id` int not null,
FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse`(`warehouse_id`),
FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`)
);

