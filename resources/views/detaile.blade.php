<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
<div class="min-h-screen bg-gray-50">
    <!-- Header/Navigation Bar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <span class="text-gray-800 font-medium">Item Details</span>
                <div class="w-6"></div> <!-- Spacer for alignment -->
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Image Gallery -->
        <div class="mb-8">
            <div class="relative rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $annonce->image) }}" alt="Item Image" class="w-full h-[400px] object-cover">
                <span
                    class="absolute top-4 right-4 bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1 rounded-full">
                    {{ $annonce->type }}
                </span>
            </div>
            <!-- Thumbnail Gallery -->
            <div class="mt-4 grid grid-cols-4 gap-4">
                <div class="rounded-lg overflow-hidden">
                    <img src="path/to/thumbnail1.jpg" alt=""
                        class="w-full h-24 object-cover cursor-pointer hover:opacity-75">
                </div>
                <!-- Add more thumbnails as needed -->
            </div>
        </div>

        <!-- Item Details -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <div class="flex justify-between items-start mb-4">
                <h1 class="text-2xl font-bold text-gray-900">{{ $annonce->title }}</h1>
                <button class="text-gray-400 hover:text-red-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
            </div>

            <!-- Date and Location -->
            <div class="flex flex-wrap gap-4 mb-6">
                <div class="flex items-center text-gray-600">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>{{ $annonce->posted_ago }}</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Location : {{ $annonce->location }}</span>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-2">Description</h2>
                <p class="text-gray-600 leading-relaxed">
                {{ $annonce->description }}
                </p>
            </div>

            <!-- Additional Details -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-2">Additional Details</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-gray-600">
                        <span class="font-medium">Category:</span>
                        <span class="ml-2">{{ $annonce->category }}</span>
                    </div>
                    <div class="text-gray-600">
                        <span class="font-medium">Status:</span>
                        <span class="ml-2">{{ $annonce->status }}</span>
                    </div>
                    <div class="text-gray-600">
                        <span class="font-medium">Date {{ $annonce->type }}:</span>
                        <span class="ml-2">{{ $annonce->date_of_event }}</span>
                    </div>
                    <div class="text-gray-600">
                        <span class="font-medium">Reference ID:</span>
                        <span class="ml-2">{{ $annonce->id }}</span>
                    </div>
                </div>
            </div>
        </div>
<!-- Like & Comment Section -->
<div class="bg-white rounded-lg shadow-sm p-6 mt-6">
    <!-- Bouton Like -->
    <div class="flex items-center mb-4">
        <form action="" method="POST">
            @csrf
            <button type="submit" class="flex items-center text-gray-600 hover:text-red-500">
               
                    <i class="fas fa-heart text-red-500"></i>
                
                    <i class="far fa-heart"></i>
     
                <span class="ml-2">1</span>
            </button>
        </form>
    </div>

    <!-- Section Commentaires -->
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Commentaires</h2>

    <!-- Affichage des commentaires -->
    <div class="space-y-4">
            <div class="border-b pb-4">
                <p class="text-gray-900 font-medium"></p>
                <p class="text-gray-600 text-sm"></p>
                <p class="text-gray-700"></p>
            </div>
        
    </div>

    <!-- Formulaire d'ajout de commentaire -->
        <form  method="POST" class="mt-4" action="{{ route('comment.poster') }}">
            @csrf
            <textarea name="content" rows="3" class="w-full border rounded-lg p-2" placeholder="Ajouter un commentaire..." required></textarea>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden"  name="announcement_id" value="{{ $annonce->id_annonce }}">
            <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
                Poster
            </button>
        </form>
        <p class="text-gray-600 text-sm">Veuillez <a href="" class="text-blue-500">vous connecter</a> pour commenter.</p>
 
</div>
<!-- Comments Section -->
@if ($annonce && $annonce->comments && count($annonce->comments) > 0)
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200 mt-8">
        <h2 class="text-xl font-semibold text-gray-900 mb-5">Comments</h2>

        <div class="space-y-6">
            @foreach ($annonce->comments as $comment)
                <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <!-- User Avatar -->
                    <img src="" alt="User Avatar" class="w-12 h-12 rounded-full border border-gray-300 shadow-sm">
                    
                    <div class="flex-1">
                        <!-- User Name & Comment Date -->
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-900 font-semibold text-lg">{{ $annonce->users->name }}</h3>
                            <span class="text-gray-500 text-sm">{{ $comment->created_at->format('d/m/Y H:i') ?? '' }}</span>
                        </div>

                        <p class="text-gray-700">{{ $comment->content ?? 'Aucun commentaire' }}</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-2">
                        <!-- Edit Button -->
                        <a href="{{ route('comments.edit', $comment->id) }}" 
                           class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit text-lg"></i>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" >
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt text-lg"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <p class="text-gray-500">Aucun commentaire disponible pour cette annonce.</p>
@endif


    </div>
</div>

