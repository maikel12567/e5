<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Users</h1>

                <div class="overflow-auto">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Naam</th>
                                <th class="border border-gray-300 px-4 py-2">roles</th>
                                <th class="border border-gray-300 px-4 py-2">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border border-gray-300">
                                    <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                    @foreach($user->roles as $role)
                                        <span class="bg-blue-500 text-white px-2 py-1 rounded">{{ $role->name }}</span>
                                    @endforeach
                                    </td>
                                    <td class="border border-gray-300 grid px-4 py-2">
                                        <a href="" class="text-blue-500 hover:underline">Bekijken</a>
                                        <a href="" class="text-yellow-500 hover:underline">Bewerken</a>
                                        <form action="" method="POST" onsubmit="return confirm('Weet je zeker dat je dit product wilt verwijderen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <a href="" class="bg-blue-500 text-white px-4 py-2 rounded">new user</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
