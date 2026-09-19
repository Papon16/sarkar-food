<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Food</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f7f8;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,.07);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            margin: 0;
        }

        .back {
            background: #222;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #ff5722;
        }

        .checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
        }

        .checkbox input {
            width: auto;
        }

        .btn {
            border: none;
            background: #ff5722;
            color: white;
            padding: 13px 25px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            background: #ffe5e5;
            color: #b00020;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <div class="header">

            <h1>🍔 Add New Food</h1>

            <a
                href="{{ route('admin.foods.index') }}"
                class="back"
            >
                ← Back
            </a>

        </div>


        @if($errors->any())

            <div class="error">

                @foreach($errors->all() as $error)

                    <div>{{ $error }}</div>

                @endforeach

            </div>

        @endif


        <form
            action="{{ route('admin.foods.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="form-group">

                <label>Food Name</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="e.g. Chicken Burger"
                    required
                >

            </div>


            <div class="form-group">

                <label>Category</label>

                <select name="category_id" required>

                    <option value="">
                        Select Category
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="form-group">

                <label>Description</label>

                <textarea
                    name="description"
                    placeholder="Describe this food..."
                >{{ old('description') }}</textarea>

            </div>


            <div class="form-group">

                <label>Price (৳)</label>

                <input
                    type="number"
                    name="price"
                    value="{{ old('price') }}"
                    min="0"
                    step="0.01"
                    placeholder="250"
                    required
                >

            </div>


            <div class="form-group">

                <label>Food Image</label>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                >

            </div>


            <div class="checkbox">

                <input
                    type="checkbox"
                    name="is_available"
                    value="1"
                    checked
                >

                <label style="margin:0;">
                    Food is Available
                </label>

            </div>


            <button
                type="submit"
                class="btn"
            >
                💾 Save Food
            </button>

        </form>

    </div>

</div>

</body>

</html>