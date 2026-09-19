<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - {{ $settings->restaurant_name ?? 'SarkarFood' }}</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:Arial,Helvetica,sans-serif;background:#f5f7fb;color:#14243b}
        a{text-decoration:none;color:inherit}
        .topbar{height:76px;background:#fff;border-bottom:1px solid #e7ebf1;display:flex;align-items:center;justify-content:space-between;padding:0 4%;position:sticky;top:0;z-index:20}
        .brand{display:flex;align-items:center;gap:12px}
        .brand-logo{width:48px;height:48px;border-radius:50%;background:#fff2e9;display:flex;align-items:center;justify-content:center;font-size:27px}
        .brand-name{font-size:25px;font-weight:800;letter-spacing:-.5px}
        .brand-name span{color:#ff5a1f}
        .tagline{font-size:11px;color:#718096;margin-top:2px}
        .top-actions{display:flex;align-items:center;gap:18px}
        .visit-btn{display:inline-flex;align-items:center;gap:8px;padding:11px 17px;border:1px solid #dbe1e9;border-radius:9px;background:#fff;font-weight:700;font-size:14px;transition:.2s}
        .visit-btn:hover{border-color:#ff5a1f;color:#ff5a1f;transform:translateY(-1px)}
        .bell{position:relative;font-size:21px}
        .badge{position:absolute;top:-8px;right:-8px;background:#ff4d4f;color:#fff;border-radius:50%;font-size:10px;min-width:19px;height:19px;display:flex;align-items:center;justify-content:center}
        .admin{display:flex;align-items:center;gap:9px;font-weight:700}
        .avatar{width:38px;height:38px;border-radius:50%;background:#14243b;color:#fff;display:flex;align-items:center;justify-content:center}
        .layout{display:flex}
        .sidebar{width:245px;background:#14243b;color:#fff;min-height:calc(100vh - 76px);padding:25px 16px;position:fixed;left:0;top:76px;bottom:0}
        .side-brand{padding:0 15px 25px;border-bottom:1px solid rgba(255,255,255,.12);margin-bottom:20px}
        .side-brand h2{font-size:22px}.side-brand h2 span{color:#ff5a1f}.side-brand p{font-size:10px;color:#b9c3d1;margin-top:5px}
        .nav{display:flex;flex-direction:column;gap:7px}
        .nav a{padding:13px 15px;border-radius:9px;color:#d7deea;font-size:14px;font-weight:600;display:flex;gap:11px;align-items:center}
        .nav a:hover,.nav a.active{background:#ff5a1f;color:#fff}
        .main{margin-left:245px;width:calc(100% - 245px);padding:32px 4% 45px}
        .welcome{display:flex;justify-content:space-between;align-items:center;margin-bottom:26px}
        .welcome h1{font-size:29px;margin-bottom:7px}
        .welcome p{color:#738096;font-size:14px}
        .date-box{background:#fff;border:1px solid #e1e6ed;border-radius:10px;padding:13px 18px;font-weight:700;font-size:14px}
        .stats{display:grid;grid-template-columns:repeat(4,1fr);gap:17px;margin-bottom:24px}
        .stat{background:#fff;border:1px solid #e7ebf1;border-radius:13px;padding:20px;display:flex;gap:15px;align-items:flex-start;box-shadow:0 2px 10px rgba(20,36,59,.03)}
        .stat-icon{width:50px;height:50px;border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:24px;background:#fff0e8}
        .stat:nth-child(2) .stat-icon{background:#eaf8ef}
        .stat:nth-child(3) .stat-icon{background:#eaf2ff}
        .stat:nth-child(4) .stat-icon{background:#fff0f1}
        .stat-title{font-size:13px;color:#708096;margin-bottom:6px}.stat-number{font-size:27px;font-weight:800}.stat-change{font-size:12px;color:#19a85b;margin-top:6px}
        .grid{display:grid;grid-template-columns:1.45fr 1fr;gap:18px}
        .card{background:#fff;border:1px solid #e7ebf1;border-radius:13px;padding:21px;box-shadow:0 2px 10px rgba(20,36,59,.03)}
        .card-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
        .card-head h2{font-size:18px}
        .select{border:1px solid #dbe1e9;background:#fff;border-radius:8px;padding:9px 12px}
        .chart{height:290px;display:flex;align-items:flex-end;gap:12px;border-bottom:1px solid #dce2ea;border-left:1px solid #dce2ea;padding:20px 10px 0}
        .bar-wrap{height:100%;flex:1;display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:8px}
        .bar{width:70%;max-width:48px;border-radius:7px 7px 0 0;background:#ff5a1f;min-height:5px}
        .bar-label{font-size:11px;color:#7b8798}
        .recent table{width:100%;border-collapse:collapse}
        .recent th,.recent td{padding:13px 8px;border-bottom:1px solid #edf0f4;text-align:left;font-size:12px}
        .recent th{color:#748196;font-size:11px}
        .status{padding:6px 9px;border-radius:20px;font-size:11px;font-weight:700;display:inline-block}
        .pending{background:#fff0f0;color:#e53935}.confirmed{background:#eaf2ff;color:#1976d2}.preparing{background:#fff4db;color:#d88a00}.delivered{background:#e8f8ee;color:#168b4a}.cancelled{background:#eee;color:#666}
        .actions{display:grid;grid-template-columns:repeat(4,1fr);gap:15px;margin-top:18px}
        .action{background:#fff;border:1px solid #e7ebf1;border-radius:12px;padding:19px;display:flex;align-items:center;gap:13px}
        .action-icon{width:45px;height:45px;border-radius:11px;background:#fff0e8;display:flex;align-items:center;justify-content:center;font-size:21px}
        .action h3{font-size:14px}.action p{font-size:11px;color:#7b8798;margin-top:4px}
        .arrow{margin-left:auto;font-size:20px;color:#6d7b8e}
        .footer{margin-top:25px;padding-top:18px;border-top:1px solid #e2e7ee;color:#78869a;font-size:12px;display:flex;justify-content:space-between}
        @media(max-width:1100px){.stats{grid-template-columns:repeat(2,1fr)}.grid{grid-template-columns:1fr}.actions{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:760px){.sidebar{display:none}.main{margin-left:0;width:100%}.visit-btn{display:none}.welcome{align-items:flex-start;gap:15px;flex-direction:column}.stats{grid-template-columns:1fr}.actions{grid-template-columns:1fr}.topbar{padding:0 18px}.brand-name{font-size:20px}}
    </style>
</head>

<body>

<header class="topbar">
    <div class="brand">
        <div class="brand-logo">🍔</div>
        <div>
            <div class="brand-name">
                {{ $settings->restaurant_name ?? 'Sarkar' }}<span>Food</span>
            </div>
            <div class="tagline">Good Food &nbsp; Better Mood</div>
        </div>
    </div>

    <div class="top-actions">
        <a href="{{ route('home') }}" class="visit-btn">⌂ &nbsp; Visit Website ↗</a>

        <div class="bell">
            🔔
            @if(($pendingOrders ?? 0) > 0)
                <span class="badge">{{ $pendingOrders }}</span>
            @endif
        </div>

        <div class="admin">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A',0,1)) }}
            </div>
            <span>{{ auth()->user()->name ?? 'Admin' }}</span>
            <span>⌄</span>
        </div>
    </div>
</header>

<div class="layout">

    <aside class="sidebar">
        <div class="side-brand">
            <h2>{{ $settings->restaurant_name ?? 'Sarkar' }}<span>Food</span></h2>
            <p>Good Food &nbsp; Better Mood</p>
        </div>

        <nav class="nav">
            <a href="{{ route('admin.dashboard') }}" class="active">⌂ &nbsp; Dashboard</a>
            <a href="{{ route('admin.orders') }}">🛒 &nbsp; Orders</a>
            <a href="{{ route('admin.foods.index') }}">🍴 &nbsp; Foods</a>
            <a href="{{ route('admin.categories.index') }}">▦ &nbsp; Categories</a>
            <a href="{{ route('admin.messages') }}">✉ &nbsp; Messages</a>
            <a href="{{ route('admin.admins') }}">👥 &nbsp; Admins</a>
            <a href="{{ route('admin.settings') }}">⚙ &nbsp; Settings</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}" style="margin-top:35px">
            @csrf
            <button type="submit" style="width:100%;padding:13px 15px;background:transparent;border:0;color:#d7deea;text-align:left;font-weight:600;cursor:pointer;border-radius:9px">
                🚪 &nbsp; Logout
            </button>
        </form>
    </aside>

    <main class="main">

        <section class="welcome">
            <div>
                <h1>👋 Welcome Back, Admin!</h1>
                <p>Here's what's happening with your food business today.</p>
            </div>

            <div class="date-box">
                📅 {{ now()->format('F d, Y') }}
            </div>
        </section>

        <section class="stats">

            <div class="stat">
                <div class="stat-icon">🛍</div>
                <div>
                    <div class="stat-title">Total Orders</div>
                    <div class="stat-number">{{ $totalOrders ?? 0 }}</div>
                    <div class="stat-change">↑ Active orders</div>
                </div>
            </div>

            <div class="stat">
                <div class="stat-icon">💰</div>
                <div>
                    <div class="stat-title">Total Revenue</div>
                    <div class="stat-number">{{ $settings->currency ?? '৳' }} {{ number_format($totalRevenue ?? 0,2) }}</div>
                    <div class="stat-change">↑ Excluding cancelled</div>
                </div>
            </div>

            <div class="stat">
                <div class="stat-icon">👥</div>
                <div>
                    <div class="stat-title">Total Customers</div>
                    <div class="stat-number">{{ $totalCustomers ?? 0 }}</div>
                    <div class="stat-change">↑ Registered users</div>
                </div>
            </div>

            <div class="stat">
                <div class="stat-icon">🍴</div>
                <div>
                    <div class="stat-title">Total Foods</div>
                    <div class="stat-number">{{ $totalFoods ?? 0 }}</div>
                    <div class="stat-change">↑ Menu items</div>
                </div>
            </div>

        </section>

        <section class="grid">

            <div class="card">
                <div class="card-head">
                    <h2>📊 Order Overview</h2>

                    <form method="GET" action="{{ route('admin.dashboard') }}">
                        <select class="select" name="period" onchange="this.form.submit()">
                            <option value="7" {{ ($period ?? '7') == '7' ? 'selected' : '' }}>Last 7 Days</option>
                            <option value="30" {{ ($period ?? '7') == '30' ? 'selected' : '' }}>Last 30 Days</option>
                            <option value="all" {{ ($period ?? '7') == 'all' ? 'selected' : '' }}>All Orders</option>
                        </select>
                    </form>
                </div>

                <div class="chart">
                    @php
                        $chart = $chartData ?? [];
                        $maxChart = collect($chart)->max('orders') ?: 1;
                    @endphp

                    @forelse($chart as $item)
                        @php
                            $height = max(8, (($item['orders'] ?? 0) / $maxChart) * 210);
                        @endphp

                        <div class="bar-wrap">
                            <div class="bar"
                                 style="height:{{ $height }}px"
                                 title="{{ $item['orders'] ?? 0 }} orders">
                            </div>
                            <div class="bar-label">{{ $item['label'] ?? '' }}</div>
                        </div>
                    @empty
                        <div style="margin:auto;color:#78869a;font-size:13px">
                            No order data available.
                        </div>
                    @endforelse
                </div>
            </div>


            <div class="card recent">
                <div class="card-head">
                    <h2>📋 Recent Orders</h2>
                    <a href="{{ route('admin.orders') }}" style="color:#ff5a1f;font-size:13px;font-weight:700">
                        View All →
                    </a>
                </div>

                @if(($recentOrders ?? collect())->count())

                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($recentOrders as $order)
                                @php
                                    $status = strtolower($order->status ?? 'pending');
                                    $statusClass = match($status) {
                                        'confirmed' => 'confirmed',
                                        'preparing' => 'preparing',
                                        'delivered' => 'delivered',
                                        'cancelled' => 'cancelled',
                                        default => 'pending'
                                    };
                                @endphp

                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->customer_name ?? 'Customer' }}</td>
                                    <td>{{ $settings->currency ?? '৳' }} {{ number_format($order->total ?? 0,2) }}</td>
                                    <td>
                                        <span class="status {{ $statusClass }}">
                                            {{ ucfirst($status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @else
                    <div style="padding:45px 10px;text-align:center;color:#7b8798">
                        No orders found.
                    </div>
                @endif
            </div>

        </section>


        <section class="actions">

            <a href="{{ route('admin.foods.index') }}" class="action">
                <div class="action-icon">🍴</div>
                <div>
                    <h3>Manage Foods</h3>
                    <p>Add, edit or remove foods</p>
                </div>
                <div class="arrow">›</div>
            </a>

            <a href="{{ route('admin.orders') }}" class="action">
                <div class="action-icon">☷</div>
                <div>
                    <h3>Manage Orders</h3>
                    <p>View and update orders</p>
                </div>
                <div class="arrow">›</div>
            </a>

            <a href="{{ route('admin.categories.index') }}" class="action">
                <div class="action-icon">▦</div>
                <div>
                    <h3>Categories</h3>
                    <p>Manage food categories</p>
                </div>
                <div class="arrow">›</div>
            </a>

            <a href="{{ route('admin.settings') }}" class="action">
                <div class="action-icon">⚙</div>
                <div>
                    <h3>Website Settings</h3>
                    <p>Update restaurant information</p>
                </div>
                <div class="arrow">›</div>
            </a>

        </section>


        <div class="footer">
            <span>© {{ date('Y') }} <strong>{{ $settings->restaurant_name ?? 'SarkarFood' }}</strong>. All rights reserved.</span>
            <span>Good Food &nbsp; Better Mood ❤️</span>
        </div>

    </main>
</div>

</body>
</html>
