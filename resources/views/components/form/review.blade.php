    <div class="space-y-6">
        <div>
            <h3 class="text-2xl text-gray-900 mb-2">Review Your Information</h3>
            <p class="text-gray-600">Please review all details before submitting</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-gradient-to-br from-purple-50 to-blue-50 rounded-xl p-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center gap-2">
                    <span class="text-2xl">👤</span>
                    Personal Details
                </h4>
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-600">Full Name</p>
                        <p class="text-sm font-medium text-gray-900"> {{ $this->info['name'] ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Matric Number</p>
                        <p class="text-sm font-medium text-gray-900"> {{ $this->info['matric_no'] ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Course</p>
                        <p class="text-sm font-medium text-gray-900"> {{ $this->info['course'] ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Faculty</p>
                        <p class="text-sm font-medium text-gray-900"> {{ $this->info['faculty'] ?? 'Not provided' }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-xl p-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center gap-2">
                    <span class="text-2xl">📞</span>
                    Contact Information
                </h4>
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-600">Email</p>
                        <p class="text-sm font-medium text-gray-900"> {{ $this->info['email'] ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Phone</p>
                        <p class="text-sm font-medium text-gray-900"> {{ $this->info['phone'] ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Address</p>
                        <p class="text-sm font-medium text-gray-900"> {{ $this->info['address'] ?? 'Not provided' }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-orange-50 to-yellow-50 rounded-xl p-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center gap-2">
                    <span class="text-2xl">🏠</span>
                    Hostel Details
                </h4>
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-600">Hall of Residence</p>
                        <p class="text-sm font-medium text-gray-900"> {{ $this->info['hall'] ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Block & Room</p>
                        <p class="text-sm font-medium text-gray-900">
                           Not Provided
                        </p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600">Bed Space</p>
                        <p class="text-sm font-medium text-gray-900"> {{ $this->info['bed_space'] ?? 'Not provided' }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-xl p-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center gap-2">
                    <span class="text-2xl">📚</span>
                    Library Status
                </h4>
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-600">Registration Status</p>
                        <p class="text-sm font-medium text-gray-900">
                            Not Registered
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-600">Registration Number</p>
                        <p class="text-sm font-medium text-gray-900">
                          Not provided
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-600">Borrowed Books</p>
                        <p class="text-sm font-medium text-gray-900">
                         ⚠️ Has Borrowed Books
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 rounded-xl p-6">
            <h4 class="text-lg font-medium text-gray-900 mb-4">Uploaded Documents</h4>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 bg-white rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2Z" fill="#027a48"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Identification</p>
                            <p class="text-xs font-medium text-gray-500"> {{ $this->info['studentId'] ? 'Uploaded Successfully' : 'Not Uploaded' }}</p>

                        </div>
                    </div>

                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M20 6L9 17L4 12" stroke="#027a48" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                    </svg>

                </div>
                <div class="flex items-center justify-between p-3 bg-white rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2Z" fill="#027a48"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">DSA Payment Receipt</p>
                            <p class="text-xs font-medium text-gray-500"> {{ $this->info['receipt'] ? 'Uploaded Successfully' : 'Not Uploaded' }}</p>

                        </div>
                    </div>

{{--                   TODO: UI FOR WHEN IMAGES NOT UPLOADED --}}

                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M20 6L9 17L4 12" stroke="#027a48" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
                    </svg>

                </div>
            </div>
        </div>
    </div>
