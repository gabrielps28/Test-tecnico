<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Send Message</h1>
        <form action="{{ route('messages.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="platform" class="block text-gray-700 text-sm font-bold mb-2">Platform</label>
                <select name="platform" id="platform" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="Telegram">Telegram</option>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="Discord">Discord</option>
                    <option value="Slack">Slack</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="recipients" class="block text-gray-700 text-sm font-bold mb-2">Recipients (comma separated)</label>
                <input type="text" name="recipients" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message</label>
                <textarea name="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Send</button>
        </form>
    </div>
</x-app-layout>
