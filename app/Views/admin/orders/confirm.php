<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 600px;
        }

        h1 {
            color: #2d3748;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            text-align: center;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 1rem;
        }

        .order-details {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .order-details p {
            margin-bottom: 1rem;
            color: #4a5568;
            font-size: 1.1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-details p:last-child {
            margin-bottom: 0;
        }

        .order-details strong {
            color: #2d3748;
        }

        .confirmation-form {
            text-align: center;
        }

        .confirmation-form label {
            display: block;
            margin-bottom: 1.5rem;
            color: #4a5568;
            font-size: 1.1rem;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .button-confirm,
        .button-cancel {
            padding: 0.75rem 2rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .button-confirm {
            background-color: #4299e1;
            color: white;
            border: none;
        }

        .button-confirm:hover {
            background-color: #3182ce;
        }

        .button-cancel {
            background-color: #e2e8f0;
            color: #4a5568;
            border: none;
        }

        .button-cancel:hover {
            background-color: #cbd5e0;
        }

        .status-badge {
            background-color: #ebf8ff;
            color: #2b6cb0;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        @media (max-width: 480px) {
            .container {
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            .order-details p {
                font-size: 1rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 0.25rem;
            }

            .button-group {
                flex-direction: column;
            }

            .button-confirm,
            .button-cancel {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Konfirmasi Pesanan #<?= esc($order['id']) ?></h1>

        <div class="order-details">
            <p>
                <strong>Nama Pelanggan:</strong>
                <span><?= esc($order['customer_name']) ?></span>
            </p>
            <p>
                <strong>Total Pembayaran:</strong>
                <span>Rp <?= number_format($order['total'], 0, ',', '.') ?></span>
            </p>
            <p>
                <strong>Status Saat Ini:</strong>
                <span class="status-badge"><?= esc($order['status']) ?></span>
            </p>
            <p>
                <strong>Metode Pembayaran:</strong>
                <span><?= esc($order['metode_pembayaran']) ?></span>
            </p>
        </div>

        <form action="<?= site_url('admin/orders/confirm/' . $order['id']) ?>" method="post" class="confirmation-form">
            <label for="confirm-status">Apakah Anda yakin ingin mengonfirmasi pesanan ini?</label>
            <div class="button-group">
                <button type="submit" class="button-confirm">Konfirmasi</button>
                <a href="<?= site_url('admin/orders') ?>" class="button-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>