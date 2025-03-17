@foreach($school as $school)
<tr>
    <td class="text-nowrap"><span class="badge bg-secondary">{{ $school->id }}</span></td>
    <td class="text-nowrap"><span class="badge bg-success">
            {{ \Carbon\Carbon::parse($school->date)->format('d-m-Y') }}
        </span></td>
    <td class="text-nowrap">{{ $school->sname }}</td>
    <td class="text-nowrap"><i class="fas fa-map-marker-alt text-danger"></i> {{ $school->addr }}</td>
    <td class="text-nowrap">{{ $school->cn }}</td>
    <td class="text-nowrap">{{ $school->time }}</td>
    <td class="text-nowrap"><span class="badge bg-primary">{{ $school->stud }}</span></td>
    <td class="text-nowrap"><span class="badge bg-warning">{{ $school->teacher }}</span></td>
    <td class="text-nowrap">{{ $school->netamount }}</td>
    <td class="text-nowrap">{{ $school->admin ? $school->admin->name : 'Website' }}</td>
</tr>
@endforeach