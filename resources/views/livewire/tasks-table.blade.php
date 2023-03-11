<table class="table table-striped" wire:sortable="updateTaskOrder">
    <tbody>
    @forelse ($tasks as $task)
    <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
        <td>{{$task->name}}</td>
        <td>{!! $task->description !!}</td>
        <td>
        <a class="btn btn-sm btn-primary" href="{{ route('admin.checklists.tasks.edit', [$checklist, $task])}}"> {{ __('Edit')}}</a>
            <form style="display: inline-block"
            action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task])}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                    onclick="return confirm('{{ __('Are you sure?') }}')" type="submit">{{ __('Delete') }}</button>
            </form>
        </td>
    </tr>
    @empty
    <p>Table is empty</p>
    @endforelse
    </tbody>
</table>
