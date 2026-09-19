<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Food Management</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f6f7f9;
            color: #222;
        }

        .container {
            max-width: 1250px;
            margin: 35px auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
        }

        .header p {
            margin-top: 7px;
            color: #777;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            text-decoration: none;
            border: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-orange {
            background: #ff5722;
            color: white;
        }

        .btn-dark {
            background: #222;
            color: white;
        }

        .toolbar {
            background: white;
            padding: 18px;
            border-radius: 12px;
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            box-shadow: 0 3px 15px rgba(0,0,0,.05);
        }

        .toolbar input,
        .toolbar select {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }

        .search {
            flex: 1;
        }

        .food-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 3px 18px rgba(0,0,0,.06);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #fff5f0;
            text-align: left;
            padding: 16px;
            font-size: 13px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        .food-image {
            width: 70px;
            height: 55px;
            object-fit: cover;
            border-radius: 8px;
            background: #f4f4f4;
        }

        .food-name {
            font-weight: bold;
            font-size: 15px;
        }

        .description {
            color: #888;
            font-size: 13px;
            margin-top: 5px;
            max-width: 300px;
        }

        .price {
            color: #ff5722;
            font-weight: bold;
        }

        .category {
            background: #f1f1f1;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .available {
            background: #e2f7e9;
            color: #16803c;
        }

        .unavailable {
            background: #ffe5e5;
            color: #c62828;
        }

        .actions {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        .action-btn {
            border: none;
            padding: 8px 11px;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
        }

        .edit {
            background: #eaf2ff;
            color: #246bce;
        }

        .delete {
            background: #ffe8e8;
            color: #d32f2f;
        }

        .toggle {
            background: #f3f3f3;
            color: #333;
        }

        .success {
            background: #e4f7e9;
            color: #18743a;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .empty {
            text-align: center;
            padding: 70px 20px;
            color: #777;
        }

        .empty-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        @media(max-width: 800px) {

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .toolbar {
                flex-direction: column;
            }

            .food-card {
                overflow-x: auto;
            }

            table {
                min-width: 900px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">

        <div>
            <h1>🍔 Food Management</h1>
            <p>Manage your restaurant menu from here.</p>
        </div>

        <div class="buttons">

            <a href="{{ route('admin.dashboard') }}"
               class="btn btn-dark">
                ← Dashboard
            </a>

            <a href="{{ route('admin.foods.create') }}"
               class="btn btn-orange">
                + Add New Food
            </a>

        </div>

    </div>


    <!-- SUCCESS -->
    @if(session('success'))

        <div class="success">
            ✓ {{ session('success') }}
        </div>

    @endif


    <!-- SEARCH + FILTER -->
    <form method="GET" action="{{ route('admin.foods.index') }}">

        <div class="toolbar">

            <input
                class="search"
                type="text"
                name="search"
                placeholder="🔍 Search food..."
                value="{{ request('search') }}"
            >

            <select name="category">

                <option value="">
                    All Categories
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

            <button class="btn btn-orange" type="submit">
                Search
            </button>

        </div>

    </form>


    <!-- FOOD TABLE -->

    <div class="food-card">

        @if($foods->count())

            <table>

                <thead>

                    <tr>
                        <th>Image</th>
                        <th>Food</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                @foreach($foods as $food)

                    <tr>

                        <td>

                            @if($food->image)

                                <img
                                    src="{{ asset('storage/' . $food->image) }}"
                                    class="food-image"
                                >

                            @else

                                <div class="food-image"
                                     style="display:flex;align-items:center;justify-content:center;font-size:25px;">
                                    🍽️
                                </div>

                            @endif

                        </td>


                        <td>

                            <div class="food-name">
                                {{ $food->name }}
                            </div>

                            <div class="description">
                                {{ Str::limit($food->description, 70) }}
                            </div>

                        </td>


                        <td>

                            <span class="category">
                                {{ $food->category->name ?? 'Uncategorized' }}
                            </span>

                        </td>


                        <td>

                            <span class="price">
                                ৳{{ number_format($food->price, 2) }}
                            </span>

                        </td>


                        <td>

                            @if($food->is_available)

                                <span class="status available">
                                    ● Available
                                </span>

                            @else

                                <span class="status unavailable">
                                    ● Unavailable
                                </span>

                            @endif

                        </td>


                        <td>

                            <div class="actions">

                                <!-- EDIT -->
                                <a
                                    href="{{ route('admin.foods.edit', $food->id) }}"
                                    class="action-btn edit"
                                >
                                    ✏️ Edit
                                </a>


                                <!-- TOGGLE -->
                                <form
                                    action="{{ route('admin.foods.toggle', $food->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="action-btn toggle"
                                    >
                                        {{ $food->is_available ? 'Hide' : 'Show' }}
                                    </button>

                                </form>


                                <!-- DELETE -->
                                <form
                                    action="{{ route('admin.foods.destroy', $food->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this food?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-btn delete"
                                    >
                                        🗑️ Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        @else

            <div class="empty">

                <div class="empty-icon">
                    🍽️
                </div>

                <h2>No Foods Found</h2>

                <p>
                    Add your first food item to start building your menu.
                </p>

                <a
                    href="{{ route('admin.foods.create') }}"
                    class="btn btn-orange"
                >
                    + Add Food
                </a>

            </div>

        @endif

    </div>

</div>

</body>

</html>