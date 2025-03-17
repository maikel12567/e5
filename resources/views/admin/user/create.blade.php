<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">user aanmaken</h1>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
                        <strong>Fouten gevonden:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium text-gray-700">Naam:</label>
                            <input type="text" name="name" value="" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">E-mail:</label>
                            <input type="email" name="email" value="" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Wachtwoord (leeg laten om niet te wijzigen):</label>
                            <input type="password" name="password" class="w-full p-2 border rounded">
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Credit:</label>
                            <input type="number" name="credit" value="" class="w-full p-2 border rounded">
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Rol:</label>
                            <select name="role" class="w-full p-2 border rounded">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-6 flex gap-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Opslaan</button>
                        <a href="{{ route('admin.user') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Annuleren</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
