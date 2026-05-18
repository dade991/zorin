# ZORIN RICE MILLING SYSTEM — COMPLETE SETUP GUIDE
# For Agentic AI / Autonomous Agent

## PROJECT OVERVIEW
- Laravel project named: zorin
- Location: C:\laragon\www\zorin
- Stack: Laravel + Breeze (auth) + Vite + SQLite or MySQL
- Purpose: Rice milling management system

---

## STEP 1 — CREATE DIRECTORY STRUCTURE

Create these folders inside C:\laragon\www\zorin if they don't exist:

```
C:\laragon\www\zorin\
├── app\
│   ├── Http\
│   │   └── Controllers\        ← PUT ALL *Controller.php FILES HERE
│   └── Models\                 ← PUT ALL Model .php FILES HERE
├── database\
│   └── migrations\             ← PUT ALL migration .php FILES HERE
├── resources\
│   └── views\
│       ├── layouts\            ← CREATE THIS FOLDER, put app.blade.php here
│       ├── farmers\            ← CREATE THIS FOLDER
│       ├── paddy-purchases\    ← CREATE THIS FOLDER
│       ├── milling-batches\    ← CREATE THIS FOLDER
│       ├── inventory\          ← CREATE THIS FOLDER
│       ├── customers\          ← CREATE THIS FOLDER
│       ├── sales\              ← CREATE THIS FOLDER
│       └── reports\            ← CREATE THIS FOLDER
└── routes\
```

---

## STEP 2 — FILE PLACEMENT MAP

Place each file EXACTLY as shown below:

### ROUTES (1 file)
| File | Destination |
|------|-------------|
| web.php | C:\laragon\www\zorin\routes\web.php  ← REPLACE existing file |

### CONTROLLERS (9 files) → all go in: app\Http\Controllers\
| File |
|------|
| DashboardController.php |
| FarmerController.php |
| PaddyPurchaseController.php |
| MillingBatchController.php |
| CustomerController.php |
| SaleController.php |
| InventoryController.php |
| ReportController.php |

### MODELS (6 files) → all go in: app\Models\
| File |
|------|
| Farmer.php |
| PaddyPurchase.php |
| MillingBatch.php |
| Customer.php |
| Sale.php |
| Inventory.php |

### MIGRATIONS (6 files) → all go in: database\migrations\
| File |
|------|
| 2024_01_01_000001_create_farmers_table.php |
| 2024_01_01_000002_create_paddy_purchases_table.php |
| 2024_01_01_000003_create_milling_batches_table.php |
| 2024_01_01_000004_create_customers_table.php |
| 2024_01_01_000005_create_sales_table.php |
| 2024_01_01_000006_create_inventories_table.php |

### BLADE VIEWS (layout + dashboard)
| File | Destination |
|------|-------------|
| app.blade.php | resources\views\layouts\app.blade.php |
| dashboard.blade.php | resources\views\dashboard.blade.php  ← REPLACE |

### BLADE VIEWS — FARMERS (4 files) → resources\views\farmers\
| File |
|------|
| farmers_index.blade.php → rename to index.blade.php |
| farmers_create.blade.php → rename to create.blade.php |
| farmers_edit.blade.php → rename to edit.blade.php |
| farmers_show.blade.php → rename to show.blade.php |

### BLADE VIEWS — PADDY PURCHASES (2 files) → resources\views\paddy-purchases\
| File |
|------|
| paddy_index.blade.php → rename to index.blade.php |
| paddy_create.blade.php → rename to create.blade.php |
| paddy_edit.blade.php → rename to edit.blade.php |

### BLADE VIEWS — MILLING BATCHES (3 files) → resources\views\milling-batches\
| File |
|------|
| milling_index.blade.php → rename to index.blade.php |
| milling_create.blade.php → rename to create.blade.php |
| milling_show.blade.php → rename to show.blade.php |
| milling_edit.blade.php → rename to edit.blade.php |

### BLADE VIEWS — INVENTORY (1 file) → resources\views\inventory\
| File |
|------|
| inventory_index.blade.php → rename to index.blade.php |

### BLADE VIEWS — CUSTOMERS (4 files) → resources\views\customers\
| File |
|------|
| customers_index.blade.php → rename to index.blade.php |
| customers_create.blade.php → rename to create.blade.php |
| customers_edit.blade.php → rename to edit.blade.php |
| customers_show.blade.php → rename to show.blade.php |

### BLADE VIEWS — SALES (4 files) → resources\views\sales\
| File |
|------|
| sales_index.blade.php → rename to index.blade.php |
| sales_create.blade.php → rename to create.blade.php |
| sales_edit.blade.php → rename to edit.blade.php |
| sales_show.blade.php → rename to show.blade.php |

### BLADE VIEWS — REPORTS (1 file) → resources\views\reports\
| File |
|------|
| reports_index.blade.php → rename to index.blade.php |

---

## STEP 3 — RUN THESE COMMANDS IN ORDER

Open a terminal/CMD inside C:\laragon\www\zorin and run these one by one:

```bash
# 1. Run database migrations (creates all tables)
php artisan migrate

# If you get errors about tables already existing, run this instead:
php artisan migrate:fresh

# 2. Clear all caches
php artisan route:clear
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# 3. Verify routes registered correctly (you should see farmers, sales, etc.)
php artisan route:list
```

---

## STEP 4 — START THE SERVERS

Open TWO separate terminal windows, both in C:\laragon\www\zorin:

**Terminal 1:**
```bash
php artisan serve
```

**Terminal 2:**
```bash
npm run dev
```

---

## STEP 5 — TEST IN BROWSER

1. Go to: http://localhost:8000
2. Click "Get Started Free" or "Sign In"
3. Register a new account
4. You will land on the Dashboard
5. Test each module: Farmers → Add Farmer → fill form → Save

---

## STEP 6 — IF YOU GET ERRORS

### Error: "Route [farmers.index] not defined"
→ You forgot to replace routes/web.php. Replace it with the new web.php file.

### Error: "Class not found" for any Controller or Model
→ Run: php artisan optimize:clear

### Error: "Table does not exist"
→ Run: php artisan migrate

### Error: "SQLSTATE" database errors
→ Check your .env file has correct DB settings. For SQLite add:
```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```
Then create the file: database\database.sqlite (empty file)
Then run: php artisan migrate

### Error: Vite manifest not found
→ Run: npm install && npm run dev

### Error: Views not found (e.g. "View [farmers.index] not found")
→ Double check the folder names. They must be exactly:
- resources/views/farmers/  (not "farmer")
- resources/views/paddy-purchases/  (with hyphen)
- resources/views/milling-batches/  (with hyphen)

---

## COMPLETE FILE LIST (44 files total)

```
routes/
  web.php

app/Http/Controllers/
  DashboardController.php
  FarmerController.php
  PaddyPurchaseController.php
  MillingBatchController.php
  CustomerController.php
  SaleController.php
  InventoryController.php
  ReportController.php

app/Models/
  Farmer.php
  PaddyPurchase.php
  MillingBatch.php
  Customer.php
  Sale.php
  Inventory.php

database/migrations/
  2024_01_01_000001_create_farmers_table.php
  2024_01_01_000002_create_paddy_purchases_table.php
  2024_01_01_000003_create_milling_batches_table.php
  2024_01_01_000004_create_customers_table.php
  2024_01_01_000005_create_sales_table.php
  2024_01_01_000006_create_inventories_table.php

resources/views/
  dashboard.blade.php
  layouts/
    app.blade.php
  farmers/
    index.blade.php
    create.blade.php
    edit.blade.php
    show.blade.php
  paddy-purchases/
    index.blade.php
    create.blade.php
    edit.blade.php
  milling-batches/
    index.blade.php
    create.blade.php
    edit.blade.php
    show.blade.php
  inventory/
    index.blade.php
  customers/
    index.blade.php
    create.blade.php
    edit.blade.php
    show.blade.php
  sales/
    index.blade.php
    create.blade.php
    edit.blade.php
    show.blade.php
  reports/
    index.blade.php
```

---

## MODULES INCLUDED

1. Dashboard — stats, revenue chart, recent activity
2. Farmers — full CRUD (add, view, edit, delete)
3. Paddy Purchases — record purchases linked to farmers, auto-calculates total
4. Milling Batches — log paddy input/rice output, auto-calculates efficiency, updates inventory
5. Inventory — live stock levels, manual adjustment
6. Customers — full CRUD
7. Sales — record sales, deducts from inventory when paid, status tracking
8. Reports — date-filtered revenue, cost, profit, efficiency summary + CSV export
9. Settings — 5 themes: Forest (green), Midnight (dark), Ember (red), Ocean (blue), Golden (amber)

---

## FEATURES

- All pages use the shared layout: resources/views/layouts/app.blade.php
- Sidebar with active link highlighting
- Theme switcher (stored in session, applied via data-theme on html tag)
- Auto-calculated totals on purchase and sale forms
- Flash success/error messages on all actions
- Pagination on all list pages
- Mobile responsive sidebar (hamburger toggle)
- Nigerian Naira (₦) currency throughout
