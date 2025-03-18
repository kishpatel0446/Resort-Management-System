<table class="table table-bordered">
    <thead>
        <tr>
            <th>Date</th>
            <th>Total Purchases</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
        @php 
            $uniqueDates = [];
        @endphp
        @foreach($purchases as $purchase)
            @if(!in_array($purchase->purchase_date, $uniqueDates))
                @php $uniqueDates[] = $purchase->purchase_date; @endphp
                <tr class="purchase-row" data-date="{{ $purchase->purchase_date }}">
                    <td>{{ $purchase->purchase_date }}</td>
                    <td colspan="2" class="text-center clickable">Click to view</td>
                </tr>
                <tr class="item-details" id="items-{{ $purchase->purchase_date }}" style="display: none;">
                    <td colspan="3">
                        <div class="loading-text">Loading...</div>
                        <div class="items-content"></div>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".purchase-row").click(function() {
            var date = $(this).data("date");
            var detailsRow = $("#items-" + date);

            if (detailsRow.is(":visible")) {
                detailsRow.hide();
            } else {
                $(".item-details").hide();
                detailsRow.show();

                if (detailsRow.find(".items-content").is(":empty")) {
                    $.ajax({
                        url: "/reports/getPurchaseItems",
                        method: "GET",
                        data: { date: date },
                        beforeSend: function() {
                            detailsRow.find(".loading-text").show();
                        },
                        success: function(response) {
                            detailsRow.find(".loading-text").hide();
                            detailsRow.find(".items-content").html(response);
                        },
                        error: function() {
                            detailsRow.find(".loading-text").hide();
                            detailsRow.find(".items-content").html('<div class="text-danger">Error loading items</div>');
                        }
                    });
                }
            }
        });
    });
</script>

<style>
    .purchase-row {
        cursor: pointer;
        background: #f8f9fa;
    }

    .purchase-row:hover {
        background: #dfe6e9;
    }

    .loading-text {
        text-align: center;
        color: #007BFF;
        font-weight: bold;
    }

    .items-content {
        padding: 10px;
        border-top: 1px solid #ddd;
    }
</style>
