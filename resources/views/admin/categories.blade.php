<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Categories - {{ $settings->restaurant_name ?? 'SarkarFood' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f6f7f9;
            color: #172033;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        select {
            font-family: inherit;
        }

        .layout {
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            background: #17283b;
            color: white;
            position: fixed;
            inset: 0 auto 0 0;
            padding: 25px 13px;
            z-index: 20;
        }

        .brand {
            text-align: center;
            padding-bottom: 18px;
            border-bottom: 1px solid rgba(255,255,255,.15);
            margin-bottom: 18px;
        }

        .brand-name {
            font-size: 25px;
            font-weight: 800;
        }

        .brand-name span {
            color: #ff5a16;
        }

        .brand small {
            display: block;
            margin-top: 3px;
            color: #b9c3ce;
            font-size: 9px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 15px;
            margin: 4px 0;
            border-radius: 8px;
            font-size: 14px;
            color: #eef3f8;
            transition: .2s;
        }

        .nav-item i {
            width: 18px;
            text-align: center;
        }

        .nav-item:hover,
        .nav-item.active {
            background: #ff5a16;
            color: white;
        }

        .nav-item .badge {
            margin-left: auto;
            background: #ff4242;
            border-radius: 20px;
            min-width: 20px;
            padding: 2px 6px;
            text-align: center;
            font-size: 10px;
        }

        .sidebar-bottom {
            position: absolute;
            bottom: 25px;
            left: 13px;
            right: 13px;
            border-top: 1px solid rgba(255,255,255,.15);
            padding-top: 15px;
        }

        /* MAIN */
        .main {
            margin-left: 220px;
            width: calc(100% - 220px);
        }

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e8ebef;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 22px;
            padding: 0 30px;
        }

        .top-search {
            width: 300px;
            height: 40px;
            border: 1px solid #dce2e8;
            border-radius: 8px;
            display: flex;
            align-items: center;
            padding: 0 13px;
            color: #9aa4af;
        }

        .top-search input {
            width: 100%;
            border: 0;
            outline: 0;
            padding-left: 9px;
            font-size: 12px;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #17283b;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .notification {
            position: relative;
            font-size: 19px;
            color: #697585;
        }

        .notification span {
            position: absolute;
            top: -7px;
            right: -7px;
            background: #ff4a4a;
            color: white;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            font-size: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content {
            padding: 32px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .title-icon {
            width: 43px;
            height: 43px;
            border-radius: 10px;
            background: #ff5a16;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page-title h1 {
            font-size: 24px;
            line-height: 1.1;
        }

        .page-title p {
            color: #778291;
            font-size: 12px;
            margin-top: 4px;
        }

        .add-btn {
            border: 0;
            background: #ff5a16;
            color: white;
            padding: 12px 19px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        /* STATS */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 25px;
        }

        .stat {
            background: white;
            border: 1px solid #e5e8ec;
            border-radius: 10px;
            padding: 18px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .stat-icon {
            width: 47px;
            height: 47px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pink { background: #fff0ef; color: #ff6b6b; }
        .green { background: #e8f8ef; color: #16a35b; }
        .blue { background: #eaf1ff; color: #4776d8; }
        .orange { background: #fff0e4; color: #f18a42; }

        .stat small {
            display: block;
            color: #788493;
            font-size: 11px;
            margin-bottom: 3px;
        }

        .stat strong {
            font-size: 24px;
        }

        /* PANEL */
        .panel {
            background: white;
            border: 1px solid #e5e8ec;
            border-radius: 11px;
            padding: 17px;
        }

        .filters {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 18px;
        }

        .filter-search {
            width: 345px;
            height: 40px;
            border: 1px solid #dce2e8;
            border-radius: 7px;
            display: flex;
            align-items: center;
            padding: 0 12px;
            color: #9aa4af;
        }

        .filter-search input {
            width: 100%;
            border: 0;
            outline: 0;
            padding-left: 8px;
            font-size: 12px;
        }

        .filters select {
            height: 40px;
            border: 1px solid #dce2e8;
            border-radius: 7px;
            padding: 0 12px;
            color: #4e5b69;
            background: white;
            outline: 0;
            min-width: 125px;
        }

        /* CATEGORY GRID */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 17px;
        }

        .category-card {
            border: 1px solid #e0e5ea;
            border-radius: 9px;
            overflow: hidden;
            background: white;
        }

        .category-image {
            height: 125px;
            background: #fff0e6;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .category-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .placeholder {
            color: #b7a9c9;
            font-size: 38px;
        }

        .category-info {
            padding: 14px;
        }

        .category-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 7px;
        }

        .category-top h3 {
            font-size: 15px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .status {
            background: #def7e9;
            color: #149b54;
            border-radius: 5px;
            padding: 4px 8px;
            font-size: 9px;
            font-weight: 700;
        }

        .items {
            color: #8a95a1;
            font-size: 11px;
            margin-top: 5px;
        }

        .actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 7px;
            margin-top: 13px;
        }

        .action-btn {
            border: 0;
            border-radius: 6px;
            padding: 9px 5px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
        }

        .edit-btn {
            background: #fff0e5;
            color: #f26b27;
        }

        .delete-btn {
            background: #ffe8e8;
            color: #ee5656;
        }

        .empty {
            text-align: center;
            padding: 55px 20px;
            color: #7d8792;
            grid-column: 1 / -1;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 7px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .success {
            background: #e8f8ef;
            color: #13864b;
        }

        .error {
            background: #ffeaea;
            color: #c63f3f;
        }

        @media (max-width: 1100px) {
            .category-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 75px;
            }

            .brand-name,
            .brand small,
            .nav-item span,
            .nav-item .badge {
                display: none;
            }

            .nav-item {
                justify-content: center;
            }

            .main {
                margin-left: 75px;
                width: calc(100% - 75px);
            }

            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .top-search {
                width: 220px;
            }
        }

        @media (max-width: 550px) {
            .content {
                padding: 18px;
            }

            .stats,
            .category-grid {
                grid-template-columns: 1fr;
            }

            .page-header,
            .filters {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-search,
            .top-search {
                width: 100%;
            }

            .topbar {
                padding: 0 15px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-name">
                Sarkar<span>Food</span>
            </div>
            <small>Good Food &nbsp; Better Mood</small>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="nav-item">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.orders') }}" class="nav-item">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Orders</span>
        </a>

        <a href="{{ route('admin.foods.index') }}" class="nav-item">
            <i class="fa-solid fa-utensils"></i>
            <span>Foods</span>
        </a>

        <a href="{{ route('admin.categories.index') }}" class="nav-item active">
            <i class="fa-solid fa-table-cells"></i>
            <span>Categories</span>
        </a>

        <a href="{{ route('admin.messages') }}" class="nav-item">
            <i class="fa-regular fa-envelope"></i>
            <span>Messages</span>
        </a>

        <a href="{{ route('admin.settings') }}" class="nav-item">
            <i class="fa-solid fa-gear"></i>
            <span>Settings</span>
        </a>

        <div class="sidebar-bottom">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="nav-item"
                    style="width:100%; border:0; background:transparent; cursor:pointer;"
                >
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <header class="topbar">

            <form method="GET" action="{{ route('admin.categories.index') }}" class="top-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? request('search') }}"
                    placeholder="Search categories..."
                >
            </form>

            <div class="notification">
                <i class="fa-solid fa-bell"></i>
                @if(($pendingOrders ?? 0) > 0)
                    <span>{{ min($pendingOrders, 9) }}</span>
                @endif
            </div>

            <div class="admin-user">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                <i class="fa-solid fa-caret-down"></i>
            </div>

        </header>


        <div class="content">

            @if(session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert error">
                    {{ session('error') }}
                </div>
            @endif


            <!-- HEADER -->
            <div class="page-header">

                <div class="page-title">

                    <div class="title-icon">
                        <i class="fa-solid fa-table-cells"></i>
                    </div>

                    <div>
                        <h1>Food Categories</h1>
                        <p>Manage your food categories. Add, edit or delete categories.</p>
                    </div>

                </div>

                <a
                    href="{{ route('admin.categories.create') }}"
                    class="add-btn"
                >
                    <i class="fa-solid fa-plus"></i>
                    Add New Category
                </a>

            </div>


            <!-- STATS -->
            <div class="stats">

                <div class="stat">
                    <div class="stat-icon pink">
                        <i class="fa-solid fa-list"></i>
                    </div>
                    <div>
                        <small>Total Categories</small>
                        <strong>{{ $totalCategories ?? $categories->count() }}</strong>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-icon green">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div>
                        <small>Active Categories</small>
                        <strong>{{ $activeCategories ?? $categories->count() }}</strong>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-icon blue">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div>
                        <small>Visible on Website</small>
                        <strong>{{ $visibleCategories ?? $categories->count() }}</strong>
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-icon orange">
                        <i class="fa-solid fa-ban"></i>
                    </div>
                    <div>
                        <small>Hidden Categories</small>
                        <strong>{{ $hiddenCategories ?? 0 }}</strong>
                    </div>
                </div>

            </div>


            <!-- CATEGORY PANEL -->
            <div class="panel">

                <div class="filters">

                    <form
                        method="GET"
                        action="{{ route('admin.categories.index') }}"
                        class="filter-search"
                    >
                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? request('search') }}"
                            placeholder="Search categories..."
                        >
                    </form>

                    <div>
                        <select onchange="window.location.href=this.value">

                            <option
                                value="{{ route('admin.categories.index', ['status' => 'all', 'search' => $search ?? request('search')]) }}"
                                {{ ($status ?? request('status', 'all')) === 'all' ? 'selected' : '' }}
                            >
                                All Status
                            </option>

                            <option
                                value="{{ route('admin.categories.index', ['status' => 'active', 'search' => $search ?? request('search')]) }}"
                                {{ ($status ?? request('status')) === 'active' ? 'selected' : '' }}
                            >
                                Active
                            </option>

                            <option
                                value="{{ route('admin.categories.index', ['status' => 'hidden', 'search' => $search ?? request('search')]) }}"
                                {{ ($status ?? request('status')) === 'hidden' ? 'selected' : '' }}
                            >
                                Hidden
                            </option>

                        </select>
                    </div>

                </div>


                <div class="category-grid">

                    @forelse($categories as $category)

                        <div class="category-card">

                            <div class="category-image">

                                @if(!empty($category->category_image))

                                    <img
                                        src="{{ asset('storage/' . $category->category_image) }}"
                                        alt="{{ $category->name }}"
                                    >

                                @else

                                    <div class="placeholder">
                                        <i class="fa-solid fa-utensils"></i>
                                    </div>

                                @endif

                            </div>


                            <div class="category-info">

                                <div class="category-top">

                                    <h3>
                                        {{ $category->name }}
                                    </h3>

                                    <span class="status">
                                        Active
                                    </span>

                                </div>


                                <div class="items">
                                    {{ $category->items_count ?? 0 }}
                                    {{ ($category->items_count ?? 0) == 1 ? 'item' : 'items' }}
                                </div>


                                <div class="actions">

                                    <a
                                        href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="action-btn edit-btn"
                                        style="text-align:center;"
                                    >
                                        <i class="fa-solid fa-pen"></i>
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('admin.categories.destroy', $category->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this category?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn delete-btn"
                                            style="width:100%;"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="empty">

                            <i
                                class="fa-solid fa-folder-open"
                                style="font-size:45px; margin-bottom:12px;"
                            ></i>

                            <h3>No Categories Found</h3>

                            <p>
                                Add a new category to get started.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>
