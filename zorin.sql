CREATE TABLE farmers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    village VARCHAR(255),
    address TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE purchases (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    farmer_id BIGINT UNSIGNED NOT NULL,
    paddy_weight DECIMAL(10,2) NOT NULL,
    price_per_kg DECIMAL(10,2) NOT NULL,
    total_amount DECIMAL(12,2) NOT NULL,
    purchase_date DATE NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (farmer_id) REFERENCES farmers(id) ON DELETE CASCADE
);

CREATE TABLE milling_batches (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    purchase_id BIGINT UNSIGNED NOT NULL,
    input_weight DECIMAL(10,2) NOT NULL,
    output_weight DECIMAL(10,2) NOT NULL,
    waste_weight DECIMAL(10,2) DEFAULT 0,
    milling_date DATE NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (purchase_id) REFERENCES purchases(id) ON DELETE CASCADE
);

CREATE TABLE inventories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    quantity DECIMAL(10,2) NOT NULL DEFAULT 0,
    unit VARCHAR(50) DEFAULT 'kg',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE customers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    address TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE sales (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id BIGINT UNSIGNED NOT NULL,
    inventory_id BIGINT UNSIGNED NOT NULL,
    quantity DECIMAL(10,2) NOT NULL,
    price_per_kg DECIMAL(10,2) NOT NULL,
    total_amount DECIMAL(12,2) NOT NULL,
    sale_date DATE NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE,
    FOREIGN KEY (inventory_id) REFERENCES inventories(id) ON DELETE CASCADE
);

CREATE TABLE expenses (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    amount DECIMAL(12,2) NOT NULL,
    expense_date DATE NOT NULL,
    notes TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);