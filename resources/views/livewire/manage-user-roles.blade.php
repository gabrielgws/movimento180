<div>
    @if(session('success'))
        <div id="success-message" class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                setTimeout(function () {
                    $('#success-message').fadeOut();
                }, 3000);
            });
        </script>
    @endpush





    <!-- Campo de pesquisa -->
    <div class="mb-4">
        <div class="relative z-0 w-full mb-4 group flex justify-end">
            <div class="relative rounded-[5px] max-w-[400px] w-full flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-search pointer-events-none absolute left-3 text-gray-500 ml-1">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.3-4.3"/>
                </svg>

                <input
                    type="text"
                    class="h-14 w-full rounded-full border border-gray-200 bg-white text-gray-500 px-3 py-4 text-sm leading-[22.4px] placeholder-gray-500 outline-none focus:ring-0 focus:border-yellowMovimento pl-11"
                    placeholder="Search by name or email"
                    wire:model.live="search"
                />
            </div>
        </div>
    </div>
    <!-- Campo de pesquisa -->


    <table class="table min-w-full divide-y divide-gray-200">
        <thead>
        <tr>
            <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nome
            </th>
            <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Email
            </th>
            <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Update Role
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($users as $user)
            <tr>
                <td class="px-2 py-4 whitespace-nowrap">
                    {{ $user->name }}
                </td>
                <td class="px-2 py-4 whitespace-nowrap">
                    {{ $user->email }}
                </td>
                <td class="px-2 py-4 whitespace-nowrap">
                    <select
                        class="form-select w-full max-w-fit rounded-full border border-gray-500 bg-white text-gray-500 text-sm leading-[22.4px] placeholder-gray-500 outline-none focus:ring-0 focus:border-yellowMovimento"
                        wire:change="updateRole({{ $user->id }}, $event.target.value)"
                    >
                        @foreach ($roles as $key => $label)
                            <option value="{{ $key }}" @if($key == $user->role) selected @endif>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center py-4">No users found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
