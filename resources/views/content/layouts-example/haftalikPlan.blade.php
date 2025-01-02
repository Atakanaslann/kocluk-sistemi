<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>{{ $student->name }} - Planlar</h2>
        <ul>
            @foreach($plans as $plan)
            <li>
                {{ $plan->task_name }} - {{ $plan->day }} ({{ $plan->start_time }} - {{ $plan->end_time }})
                <form method="POST" action="{{ route('coach.students.plans.destroy', [$student->id, $plan->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Sil</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
    
</body>
</html>