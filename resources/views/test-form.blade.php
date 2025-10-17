<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Test Formulaire
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>TEST - Ce formulaire doit être visible</h3>
                    <form method="POST" action="#">
                        @csrf
                        <div class="mb-4">
                            <label for="test" class="block text-sm font-medium text-gray-700">Test Input</label>
                            <input type="text" name="test" id="test" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Test Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>