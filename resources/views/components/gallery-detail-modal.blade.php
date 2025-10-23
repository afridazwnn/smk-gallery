<!-- Gallery Detail Modal -->
<div id="galleryDetailModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50 p-4" onclick="closeGalleryDetail(event)">
    <div class="bg-white rounded-2xl max-w-5xl w-full h-[85vh] overflow-hidden flex flex-col relative" onclick="event.stopPropagation()">
        <!-- Close Button Inside Container -->
        <button onclick="closeGalleryDetail()" class="absolute top-4 right-4 z-10 w-10 h-10 bg-white shadow-lg hover:bg-gray-50 rounded-full flex items-center justify-center transition-colors">
            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="flex flex-col md:flex-row h-full overflow-hidden">
            <!-- Left Side: Main Image + Interactions -->
            <div class="md:w-1/2 bg-white flex flex-col border-r border-gray-200">
                <!-- Main Image - Enlarged size -->
                <div class="flex items-start justify-center px-4 pt-6 pb-1">
                    <img id="modalMainImage" src="" alt="" class="w-full h-auto max-h-[350px] object-contain rounded-lg">
                </div>

                <!-- Minimal spacer for tight spacing -->
                <div class="flex-1"></div>

                <!-- Interaction Buttons -->
                <div class="bg-white px-4 py-3 flex items-center gap-3 border-t border-gray-100">
                    <!-- View Count (No interaction, just display) -->
                    <div class="flex items-center gap-2 text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <span id="modalViewsCount" class="font-medium text-sm">0</span>
                    </div>

                    <!-- Like Button -->
                    <button 
                        onclick="handleModalLike(event)"
                        id="modalLikeBtn"
                        class="interaction-btn flex items-center gap-2 text-gray-600 hover:text-red-500 transition-colors"
                        data-gallery-id=""
                        data-liked="false">
                        <svg class="w-5 h-5 heart-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <span id="modalLikesCount" class="font-medium text-sm">0</span>
                    </button>

                    <!-- Share Button -->
                    <button 
                        onclick="handleModalShare(event)"
                        class="interaction-btn flex items-center gap-2 text-gray-600 hover:text-blue-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                        <span class="font-medium text-sm">Share</span>
                    </button>

                    <!-- Download Button -->
                    <button 
                        onclick="handleModalDownload(event)"
                        class="interaction-btn flex items-center gap-2 text-gray-600 hover:text-green-500 transition-colors ml-auto">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        <span class="font-medium text-sm">Download</span>
                    </button>
                </div>
            </div>

            <!-- Right Side: Title, Description, Gallery Thumbnails -->
            <div class="md:w-1/2 flex flex-col overflow-hidden">
                <!-- Fixed Title -->
                <div class="px-6 pt-6 pb-2">
                    <h2 id="modalTitle" class="text-lg font-bold text-gray-900 pr-12 leading-tight"></h2>
                </div>

                <!-- Scrollable Description Only -->
                <div class="px-6 pb-4">
                    <div class="max-h-32 overflow-y-auto pr-1 custom-scrollbar">
                        <p id="modalDescription" class="text-gray-600 text-sm leading-relaxed text-justify pr-3"></p>
                    </div>
                </div>

                <!-- Fixed Gallery Section -->
                <div class="px-6 pb-2">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-900">Gallery</h3>
                        <button onclick="openFullGallery()" class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center gap-1">
                            See more
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Fixed Gallery Thumbnails - Maximum 3 thumbnails -->
                <div class="px-6 pb-6">
                    <div id="modalGalleryGrid" class="grid grid-cols-3 gap-3">
                        <!-- Maximum 3 thumbnails will be displayed (CSS limits to first 3) -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Full Gallery Modal (See More) -->
<div id="fullGalleryModal" class="fixed inset-0 bg-black/90 hidden items-center justify-center z-[60] p-4" onclick="closeFullGallery(event)">
    <div class="bg-white rounded-2xl max-w-6xl w-full max-h-[90vh] overflow-auto relative" onclick="event.stopPropagation()">
        <!-- Close Button Inside Container -->
        <button onclick="closeFullGallery()" class="absolute top-3 right-3 z-10 w-9 h-9 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center transition-colors">
            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Full Gallery Grid -->
        <div id="fullGalleryGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-6 pt-14">
            <!-- Full gallery images will be loaded here -->
        </div>
    </div>
</div>

<!-- Full Size Image Viewer -->
<div id="fullSizeViewer" class="fixed inset-0 bg-black/95 hidden items-center justify-center z-[70]" onclick="closeFullSizeViewer()">
    <div class="relative w-full h-full flex items-center justify-center p-4" onclick="event.stopPropagation()">
        <!-- Close Button -->
        <button onclick="closeFullSizeViewer()" class="absolute top-4 right-4 z-10 w-12 h-12 bg-white/90 hover:bg-white rounded-full flex items-center justify-center transition-colors">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Download Button -->
        <button onclick="downloadFullSizeImage()" class="absolute top-4 right-20 z-10 w-12 h-12 bg-white/90 hover:bg-white rounded-full flex items-center justify-center transition-colors">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
        </button>

        <!-- Full Size Image -->
        <img id="fullSizeImage" src="" alt="" class="max-w-full max-h-full object-contain">
    </div>
</div>

<style>
.interaction-btn {
    padding: 8px;
    border-radius: 8px;
    transition: all 0.2s;
}

.interaction-btn:hover {
    background-color: rgba(0,0,0,0.05);
}

.interaction-btn[data-liked="true"] {
    color: #ef4444;
}

.interaction-btn[data-liked="true"] .heart-icon {
    fill: currentColor;
}

@keyframes heartBeat {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

/* Custom Scrollbar */
.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Enhanced description text styling */
#modalDescription {
    text-align: justify;
    text-justify: inter-word;
    hyphens: auto;
    word-wrap: break-word;
    line-height: 1.6;
}

/* Limit gallery to maximum 3 thumbnails */
#modalGalleryGrid > *:nth-child(n+4) {
    display: none !important;
}
</style>