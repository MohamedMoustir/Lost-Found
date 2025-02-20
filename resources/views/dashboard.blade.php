<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost&Found - Objets Perdus et Trouvés</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-gray-50">
    <!-- Notification Toast -->
    <div id="toast" class="fixed top-4 right-4 z-50 hidden">
        <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            <span id="toastMessage">Notification</span>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-indigo-600">Lost&Found</span>
                    </div>
                    <div class="hidden md:block ml-10">
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 flex items-center">
                                <i class="fas fa-home mr-2"></i> Accueil
                            </a>
                            <a href="{{ Route('annonce.form') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 flex items-center">
                                <i class="fas fa-plus-circle mr-2"></i> Publier une annonce
                            </a>
                            <a href="{{ Route('annonce.MesAnnonce') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 flex items-center">
                                <i class="fas fa-search mr-2"></i> Mes annonce
                            </a>
                            <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 flex items-center">
                                <i class="fas fa-bell mr-2"></i> Notifications
                                <span class="bg-red-500 text-white text-xs rounded-full px-2 ml-2">3</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="bg-gray-100 p-2 rounded-full hover:bg-gray-200">
                            <i class="fas fa-language text-gray-600"></i>
                        </button>
                    </div>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 flex items-center">
                        <i class="fas fa-user mr-2"></i> Connexion
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-indigo-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Retrouvez vos objets perdus</h1>
                <p class="text-xl mb-8">Une communauté bienveillante pour vous aider à retrouver vos biens</p>
                <div class="flex justify-center space-x-4">
                    <button class="bg-white text-indigo-700 px-6 py-3 rounded-md hover:bg-gray-100">
                        <i class="fas fa-search mr-2"></i> J'ai perdu quelque chose
                    </button>
                    <button class="bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-500">
                        <i class="fas fa-hand-holding-heart mr-2"></i> J'ai trouvé quelque chose
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Section -->
    <div class="max-w-7xl mx-auto -mt-8 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action ='{{ route('annonce.index') }}' class="flex flex-col space-y-4">
                <div class="flex items-center bg-gray-50 rounded-md border border-gray-300">
                    <i class="fas fa-search text-gray-400 px-4"></i>
                    <input type="text" name="search" placeholde²r="Rechercher un objet perdu..." 
                           class="w-full px-4 py-3 bg-transparent border-none focus:outline-none focus:ring-0">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <select class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Catégorie</option>
                        <option value="electronics">Électronique</option>
                        <option value="clothes">Vêtements</option>
                        <option value="documents">Documents</option>
                        <option value="keys">Clés</option>
                        <option value="pets">Animaux</option>
                        <option value="jewelry">Bijoux</option>
                    </select>
                    <select class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Lieu</option>
                        <option value="paris">Paris</option>
                        <option value="lyon">Lyon</option>
                        <option value="marseille">Marseille</option>
                    </select>
                    <select class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Date</option>
                        <option value="today">Aujourd'hui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                    </select>
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 flex items-center justify-center">
                        <i class="fas fa-search mr-2"></i> Rechercher
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Items Grid -->
    <div class="max-w-7xl mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Annonces récentes</h2>
            <div class="flex items-center space-x-4">
                <button class="text-gray-600 hover:text-indigo-600">
                    <i class="fas fa-th-large"></i>
                </button>
                <button class="text-gray-600 hover:text-indigo-600">
                    <i class="fas fa-list"></i>
                </button>
                <select class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="recent">Plus récent</option>
                    <option value="old">Plus ancien</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Carte d'annonce -->
    @if($annonce->isEmpty())
        <p class="col-span-full text-center text-gray-500">Aucune annonce disponible.</p>
    @else
        @foreach($annonce as $ann)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-200">
                <div class="relative">
                    <img src="{{ asset('storage/' . $ann->image) }}" alt="Image de l'objet" class="w-full h-48 object-cover">
                    <span class="absolute top-4 right-4 bg-yellow-100 text-yellow-800 text-sm px-3 py-1 rounded-full">
                        <i class="fas fa-search mr-1"></i>{{ $ann->type }}
                    </span>
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $ann->title }}</h3>
                    <p class="mt-2 text-gray-600 text-sm">{{ Str::limit($ann->description, 100) }}</p> 
                    <div class="mt-3 flex items-center text-sm text-gray-500">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>{{ $ann->location }}</span> 
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('annonce.detaile', ['id' => $ann->id_annonce]) }}" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i> Plus de détails
                        </a>
                        @if ($ann->type=='lost')
                      
                                <form action="{{ route('Claims.found') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value={{ Auth::id()}} name="user_id">
                                    <input type="hidden" value={{ $ann->id_annonce}} name="annonce_id">
                                    <input type="hidden" value="found" name="type">

                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-700 transition duration-200">
                                    📝 Trouvé
                                    </button>
                                </form>  
                     @else
                                <form action="{{ route('Claims.lost') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value={{ Auth::id()}} name="user_id">
                                    <input type="hidden" value={{ $ann->id_annonce}} name="annonce_id">
                                    <input type="hidden" value="mine" name="type">
                                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-700 transition duration-200">
                                        🔍 C'est à moi
                                    </button>
                                </form>
                         @endif
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>



    </div>
        <div class="flex justify-center mt-8">
    @if ($annonce->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation">
            <ul class="inline-flex items-center space-x-1">

            @if ($annonce->onFirstPage())
                    <li>
                        <span class="px-3 py-2 text-gray-500 cursor-not-allowed">&laquo; Précédent</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $annonce->previousPageUrl() }}" class="px-3 py-2 text-blue-500 hover:text-blue-700">&laquo; Précédent</a>
                    </li>
                @endif

                @foreach ($annonce->links()->elements as $element)
                    @if (is_string($element))
                        <li><span class="px-3 py-2 text-gray-500">{{ $element }}</span></li>
                    @elseif (is_array($element))
                        @foreach ($element as $page => $url)
                            <li>
                                @if ($page == $annonce->currentPage())
                                    <span class="px-3 py-2 bg-blue-500 text-white rounded-lg">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="px-3 py-2 text-blue-500 hover:text-blue-700 rounded-lg">{{ $page }}</a>
                                @endif
                            </li>
                        @endforeach
                    @endif
                @endforeach

                {{-- Bouton Suivant --}}
                @if ($annonce->hasMorePages())
                    <li>
                        <a href="{{ $annonce->nextPageUrl() }}" class="px-3 py-2 text-blue-500 hover:text-blue-700">Suivant &raquo;</a>
                    </li>
                @else
                    <li>
                        <span class="px-3 py-2 text-gray-500 cursor-not-allowed">Suivant &raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>




    <!-- Statistics Section -->
    <div class="max-w-7xl mx-auto mt-12 px-4 sm:px-6 lg:px-8 mb-12">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Statistiques</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="p-4 bg-indigo-50 rounded-lg text-center">
                    <div class="text-3xl font-bold text-indigo-600 mb-2">
                        <i class="fas fa-clipboard-list mb-2"></i>
                        <div>{{ $countAnnonce }}</div>
                    </div>
                    <div class="text-gray-600">Total des annonces</div>
                </div>
                <div class="p-4 bg-green-50 rounded-lg text-center">
                    <div class="text-3xl font-bold text-green-600 mb-2">
                        <i class="fas fa-check-circle mb-2"></i>
                        <div>{{ $countAnnonce }}</div>
                    </div>
                    <div class="text-gray-600">Objets retrouvés</div>
                </div>
                <div class="p-4 bg-yellow-50 rounded-lg text-center">
                    <div class="text-3xl font-bold text-yellow-600 mb-2">
                        <i class="fas fa-search mb-2"></i>
                        <div>85</div>
                    </div>
                    <div class="text-gray-600">Objets perdus</div>
                </div>
                <div class="p-4 bg-blue-50 rounded-lg text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">
                        <i class="fas fa-clock mb-2"></i>
                        <div>45</div>
                    </div>
                    <div class="text-gray-600">Cette semaine</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Comment ça marche ?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-upload text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Publiez une annonce</h3>
                    <p class="text-gray-600">Décrivez l'objet perdu ou trouvé avec photos et détails</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Recherchez</h3>
                    <p class="text-gray-600">Parcourez les annonces ou utilisez la recherche avancée</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Connectez-vous</h3>
                    <p class="text-gray-600">Entrez en contact et récupérez vos objets en toute sécurité</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">À propos</h3>
                    <ul class="space-y-2">
                        <li>
                            <li><a href="#" class="text-gray-600 hover:text-indigo-600">Qui sommes-nous</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Comment ça marche</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Actualités</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Témoignages</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Aide</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Centre d'aide</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">FAQ</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Contacts</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Signaler un problème</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Légal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Conditions d'utilisation</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Politique de confidentialité</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Cookies</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Mentions légales</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <p class="text-gray-600 mb-4">Restez informé des dernières annonces</p>
                    <div class="flex space-x-2">
                        <input type="email" placeholder="Votre email" class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <div class="mt-6">
                        <h4 class="text-sm font-semibold mb-3">Suivez-nous</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-indigo-600">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-indigo-600">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-indigo-600">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-indigo-600">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t mt-8 pt-8 text-center text-gray-500">
                <p>&copy; 2025 Lost&Found. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Chat Support Button -->
    <div class="fixed bottom-6 right-6">
        <button class="bg-indigo-600 text-white w-14 h-14 rounded-full shadow-lg hover:bg-indigo-700 flex items-center justify-center">
            <i class="fas fa-comments text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden" id="mobileMenu">
        <div class="bg-white h-full w-64 transform transition-transform duration-300">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-2xl font-bold text-indigo-600">Lost&Found</span>
                    <button class="text-gray-500" onclick="document.getElementById('mobileMenu').classList.add('hidden')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <nav class="space-y-4">
                    <a href="#" class="block text-gray-700 hover:text-indigo-600 py-2">
                        <i class="fas fa-home mr-2"></i> Accueil
                    </a>
                    <a href="#" class="block text-gray-700 hover:text-indigo-600 py-2">
                        <i class="fas fa-plus-circle mr-2"></i> Publier une annonce
                    </a>
                    <a href="#" class="block text-gray-700 hover:text-indigo-600 py-2">
                        <i class="fas fa-search mr-2"></i> Parcourir
                    </a>
                    <a href="#" class="block text-gray-700 hover:text-indigo-600 py-2">
                        <i class="fas fa-bell mr-2"></i> Notifications
                        <span class="bg-red-500 text-white text-xs rounded-full px-2 ml-2">3</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <!-- Quick Submit Modal -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden" id="quickSubmitModal">
        <div class="bg-white rounded-lg max-w-md mx-auto mt-20 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Publication rapide</h3>
                <button class="text-gray-500" onclick="document.getElementById('quickSubmitModal').classList.add('hidden')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type d'annonce</label>
                    <div class="flex space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="type" class="text-indigo-600">
                            <span class="ml-2">Objet perdu</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="type" class="text-indigo-600">
                            <span class="ml-2">Objet trouvé</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description rapide</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lieu</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Photo</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                        <i class="fas fa-camera text-gray-400 text-3xl mb-2"></i>
                        <p class="text-sm text-gray-500">Glissez une photo ou cliquez pour en ajouter</p>
                    </div>
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">
                    Publier
                </button>
            </form>
        </div>
    </div>



    <script>

    @if(session('status'))
        Swal.fire({
            icon: 'success',
            title: 'Opération réussie!',
            text: '{{ session('status') }}'
        });
    @endif


        function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            toastMessage.textContent = message;
            toast.classList.remove('hidden');
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }
    </script>
</body>
</html>