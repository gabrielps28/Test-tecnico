<x-app-layout>
<div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Sent Messages</h1>

        @if($messages->count())
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-2 px-4 border-b">Platform</th>
                            <th class="py-2 px-4 border-b">Message</th>
                            <th class="py-2 px-4 border-b">Recipient</th>
                            <th class="py-2 px-4 border-b">Sent on</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($messages as $message)
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="py-2 px-4 border-b text-center">{{ $message->platform }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $message->message }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $message->recipients }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $message->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="mt-4">
                {{ $messages->links() }} <!-- Asegúrate de tener el archivo de paginación adecuado -->
            </div>
        @else
            <p class="text-gray-600">No se han enviado mensajes todavía.</p>
        @endif
    </div>
</x-app-layout>
