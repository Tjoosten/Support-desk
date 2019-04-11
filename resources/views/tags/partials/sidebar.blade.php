<div class="list-group list-group-transparent">
    <a href="{{ route('tags.show', $tag) }}" class="list-group-item list-group-item-action {{ active('tags.show') }}">
        <i class="fe fe-info icon text-secondary mr-3"></i> Information
    </a>

    <a href="" class="list-group-item list-group-item-action">
        <i class="icon fe fe-list text-secondary mr-3"></i> Latest tickets
    </a>

    <a href="{{ route('tags.delete', $tag) }}" class="list-group-item list-group-item-action {{ active('tags.delete') }}">
        <i class="icon fe fe-trash-2 text-danger mr-3"></i> Delete tag
    </a>
</div>