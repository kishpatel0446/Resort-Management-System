@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Create a New Purchase Entry</h1>
    <form action="{{ route('purchases.store') }}" method="POST">
        @csrf
        <div class="row mb-4">
            <div class="col-md-6 form-group">
                <label for="purchase_date">Purchase Date</label>
                <input type="date" name="purchase_date" id="purchase_date" class="form-control" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="vendor_name">Vendor Name</label>
                <input type="text" name="vendor_name" id="vendor_name" class="form-control" required>
            </div>
        </div>

        <h3 class="mb-3">Items</h3>
        <table class="table table-bordered" id="items">
            <thead class="thead-light">
                <tr>
                    <th>Item Name</th>
                    <th>Quantity/kg.</th>
                    <th>Rate</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="item-group">
                    <td>
                        <input type="text" name="items[0][item_name]" class="form-control" required>
                    </td>
                    <td>
                        <input type="number" name="items[0][qty]" class="form-control qty" min="0" required>
                    </td>
                    <td>
                        <input type="number" name="items[0][rate]" class="form-control rate" min="0" required>
                    </td>
                    <td>
                        <input type="number" name="items[0][total_amount]" class="form-control total_amount" readonly>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-item">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-between mb-4">
            <button type="button" id="addItem" class="btn btn-info w-45">Add Item</button>
            <button type="submit" class="btn btn-primary w-45">Submit Purchase</button>
        </div>
    </form>
</div>

<script>
    let itemIndex = 1;

    document.getElementById('addItem').addEventListener('click', function() {
        const tableBody = document.querySelector('#items tbody');
        const newRow = document.createElement('tr');
        newRow.classList.add('item-group');

        newRow.innerHTML = `
            <td><input type="text" name="items[${itemIndex}][item_name]" class="form-control" required></td>
            <td><input type="number" name="items[${itemIndex}][rate]" class="form-control rate" required></td>
            <td><input type="number" name="items[${itemIndex}][qty]" class="form-control qty" required></td>
            <td><input type="number" name="items[${itemIndex}][total_amount]" class="form-control total_amount" readonly></td>
            <td><button type="button" class="btn btn-danger remove-item">Remove</button></td>
        `;
        tableBody.appendChild(newRow);

        itemIndex++;
    });

    document.querySelector('#items').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-item')) {
            e.target.closest('tr').remove();
        }
    });

    document.querySelector('#items').addEventListener('input', function(e) {
        if (e.target.matches('.rate, .qty')) {
            const row = e.target.closest('tr');
            const rate = row.querySelector('.rate').value;
            const qty = row.querySelector('.qty').value;
            const totalAmountField = row.querySelector('.total_amount');

            if (rate && qty) {
                totalAmountField.value = (parseFloat(rate) * parseFloat(qty)).toFixed(2);
            } else {
                totalAmountField.value = '';
            }
        }
    });
</script>
@endsection
