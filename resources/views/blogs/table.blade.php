<div class="flex flex-col gap-4">
    <div class="flex flex-col gap-4">
        @if (count($blogs) > 0)
            <div class="table-overflow">
                <table class="table">
                    <!-- head -->
                    <thead class=" !text-white">
                        <tr class="bg-primary !rounded-lg">
                            <th>
                                No
                            </th>
                            <th>Title</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($blogs as $key => $item)
                            <tr>
                                <th>
                                    {{ $key + 1 }}
                                </th>
                                <td>
                                    <div class="flex flex-col">
                                        <div class="font-bold">{{ $item->title ?? '-' }}</div>
                                    </div>
                                </td>
                                <th>
                                    <div class="dropdown dropdown-hover dropdown-bottom dropdown-end flex-none">
                                        <div tabindex="0" role="button"
                                            class="btn btn-sm flex items-center gap-2 btn-circle btn-outline btn-primary">
                                            <i class="fas fa-ellipsis-vertical"></i>
                                        </div>
                                        <ul tabindex="0"
                                            class="dropdown-content  z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                                 <li><a
                                                        href="{{ route('blogs.show', ['blog' => $item->id]) }}">Detail</a>
                                                </li>
                                                {{--
                                                <li><a data-selector="#edit-modal .content"
                                                        data-url="{{ route('api.accounts.show') }}?id={{ $item->id }}&type=edit"
                                                        onclick="app.HELPERS.addQueryParam({'id' : '{{ $item->id }}', 'type' : 'edit' , 'popup' : true, 'modal' : 'edit-modal'})"
                                                        data-id="{{ $item->id }}" data-type="edit" class="btn-ajax"
                                                        href="#edit-modal">Ubah Data</a></li>--}}
                                                <li> 
                                                    <form id="delete-data-form-{{ $item->id }}"
                                                        action="{{ route('blogs.destroy', ['id' => $item->id]) }}"
                                                        method="post">
                                                        @method("DELETE")
                                                        
                                                    <button type="submit">
                                                        Hapus Account
                                                    </button>
                                                        @csrf
                                                    </form>
                                                </li>
                                        </ul>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                        <!-- row 2 -->

                    </tbody>
                </table>
            </div>
        @else
            not found
        @endif
    </div>
</div>
