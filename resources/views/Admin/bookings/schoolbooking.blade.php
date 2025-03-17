@extends('layouts.admin')

@section('content')

<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4><i class="fas fa-school"></i> School Booking Form</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.bookings.schoolstore') }}">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>School Name</th>
                                <td><input type="text" class="form-control" id="sname" name="sname" placeholder="Enter School Name" required></td>

                                <th>School Address</th>
                                <td><input type="text" class="form-control" id="addr" name="addr" placeholder="Enter School Address" required></td>
                            </tr>
                            <tr>
                                <th>Mobile No</th>
                                <td><input type="text" class="form-control" id="cn" name="cn" placeholder="Enter Mobile No of Co-ordinator" required></td>

                                <th>Teachers</th>
                                <td><input type="number" class="form-control" id="teacher" name="teacher" placeholder="Enter Number of Teachers..." required></td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td><input type="date" class="form-control" id="date" name="date" required></td>

                                <th>Time</th>
                                <td>
                                    <select class="form-control" name="time" id="time" required>
                                        <option value="">Select Time</option>
                                        <option value="9:30 to 05 (RS.675)">9:30 to 05 (RS.675)</option>
                                        <option value="9:30 to 05 (RS.700)">9:30 to 05 (RS.700)</option>
                                        <option value="9:30 to 09 (RS.900)">9:30 to 09 (RS.900)</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Kids</th>
                                <td><input type="number" class="form-control" id="stud" name="stud" placeholder="Enter Number of Students" min="0" required oninput="calculateAmount()"></td>

                                <th>Rate</th>
                                <td><input type="number" class="form-control" id="rate" name="rate" placeholder="Enter Rate per Student" required oninput="calculateAmount()"></td>
                            </tr>

                            <tr>
                                <th>Amount</th>
                                <td><input type="number" class="form-control" id="amount" name="amount" readonly></td>

                                <th>Discount</th>
                                <td><input type="number" class="form-control" id="discount" name="discount" required oninput="calculateAmount()"></td>
                            </tr>

                            <tr>
                                <th>Advance</th>
                                <td><input type="number" class="form-control" id="advance" name="advance" min=0 required ></td>
                                
                                <th>Net Amount</th>
                                <td><input type="number" class="form-control" id="netamount" name="netamount" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-check-circle"></i> Confirm Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function calculateAmount() {
        let kids = document.getElementById("stud").value || 0;
        let rate = document.getElementById("rate").value || 0;
        let discount = document.getElementById("discount").value || 0;

        let amount = kids * rate;
        let netAmount = amount - discount;

        document.getElementById("amount").value = amount;
        document.getElementById("netamount").value = netAmount;
    }
</script>



@endsection