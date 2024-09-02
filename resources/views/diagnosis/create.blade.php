<table class="table table-bordered">
    <thead>
        <tr>
            <th>Cow Serial Code</th>
            <th>Symptoms</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($symptoms as $symptom)
            <tr>
                <td>{{ $symptom->cow_serial_code }}</td>
                <td>{{ $symptom->symptoms }}</td>
                <td>
                    @if($symptom->diagnosis)
                        <a href="{{ route('diagnosis.show', $symptom->diagnosis->id) }}" class="btn btn-secondary">Diagnosis Made</a>
                    @else
                        <a href="{{ route('diagnosis.create', ['id' => $symptom->id]) }}" class="btn btn-primary">Make Diagnosis</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
