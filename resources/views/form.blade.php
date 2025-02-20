
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md border">
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Modifier le commentaire</h2>

    <form action="{{ route('comment.update',[$comment->id]) }}" method="POST">
     @csrf
        <!-- Champ de texte -->
        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-medium mb-2">Votre commentaire</label>
            <textarea id="content" name="content" rows="4" 
                      class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                {{ $comment->content }}
            </textarea>
                <p class="text-red-500 text-sm mt-1"></p>
        </div>

        <!-- Boutons -->
        <div class="flex justify-end gap-2">
            <a href="" 
               class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                Annuler
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Enregistrer
            </button>
        </div>
    </form>
</div>

