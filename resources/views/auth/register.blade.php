<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Zawj | Multi-Step Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        @media (min-width: 1024px) {
            body {
                overflow: hidden;
            }
        }

        .step-inactive {
            opacity: 0.5;
            filter: grayscale(1);
        }

        /* Custom Scrollbar for better UX */
        .custom-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: #db2777;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen lg:h-screen flex items-center justify-center p-0 sm:p-4">

    <div
        class="bg-white w-full max-w-6xl h-full lg:h-[90vh] lg:max-h-[800px] sm:rounded-[2.5rem] shadow-2xl shadow-pink-100 border border-pink-50 overflow-hidden flex flex-col lg:flex-row">

        <div
            class="hidden lg:flex lg:w-4/12 bg-pink-600 p-12 flex-col justify-between text-white relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-black italic tracking-tighter">Zawj</h1>
                <p class="mt-4 text-pink-100 font-medium text-balance">Find your pious partner within the community of
                    West Bengal.</p>

                <div class="mt-16 space-y-8">
                    <div class="flex items-center gap-4 transition-all duration-300" id="step-nav-1">
                        <div
                            class="w-10 h-10 rounded-2xl bg-white/20 backdrop-blur-md border border-white/30 flex items-center justify-center font-bold">
                            1</div>
                        <span class="font-bold text-sm uppercase tracking-widest">Personal Info</span>
                    </div>
                    <div class="flex items-center gap-4 transition-all duration-300 step-inactive" id="step-nav-2">
                        <div
                            class="w-10 h-10 rounded-2xl bg-white/20 backdrop-blur-md border border-white/30 flex items-center justify-center font-bold">
                            2</div>
                        <span class="font-bold text-sm uppercase tracking-widest">Location</span>
                    </div>
                    <div class="flex items-center gap-4 transition-all duration-300 step-inactive" id="step-nav-3">
                        <div
                            class="w-10 h-10 rounded-2xl bg-white/20 backdrop-blur-md border border-white/30 flex items-center justify-center font-bold">
                            3</div>
                        <span class="font-bold text-sm uppercase tracking-widest">Lifestyle</span>
                    </div>
                </div>
            </div>

            <div class="relative z-10">
                <p class="text-[10px] font-bold text-pink-200 uppercase tracking-[0.2em]">Verified Profiles Only</p>
            </div>

            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-pink-500 rounded-full opacity-50"></div>
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-pink-700 rounded-full opacity-30"></div>
        </div>

        <div class="lg:hidden bg-pink-600 p-6 flex justify-between items-center text-white">
            <h1 class="text-2xl font-black italic">Zawj</h1>
            <div class="flex gap-2" id="mobile-step-dots">
                <div class="w-8 h-2 rounded-full bg-white transition-all" id="dot-1"></div>
                <div class="w-2 h-2 rounded-full bg-white/40 transition-all" id="dot-2"></div>
                <div class="w-2 h-2 rounded-full bg-white/40 transition-all" id="dot-3"></div>
            </div>
        </div>

        <div class="w-full lg:w-8/12 flex flex-col h-full bg-white">

            <form method="POST" action="{{ route('register') }}" id="regForm" class="flex flex-col h-full">
                @csrf

                <div class="flex-1 overflow-y-auto p-6 md:p-12 custom-scroll">

                    <div class="step-section animate-in fade-in slide-in-from-right-4 duration-500" id="step-1">
                        <div class="mb-8">
                            <h2 class="text-3xl font-black text-slate-800 tracking-tight">Personal Details</h2>
                            <p class="text-sm text-slate-400 font-medium">Let's start with your basic identity.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Full
                                    Name</label>
                                <input type="text" name="name" required
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none"
                                    placeholder="Ahmed Khan">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Email
                                    Address</label>
                                <input type="email" name="email" required
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none"
                                    placeholder="ahmed@example.com">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Phone
                                    Number</label>
                                <input type="number" name="phone" required
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none"
                                    placeholder="+912222222222">
                            </div>
                            <div class="space-y-1.5">
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Gender</label>
                                <select name="gender" required
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none appearance-none">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Date
                                    of Birth</label>
                                <input type="date" name="date_of_birth" required
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none">
                            </div>
                            <div class="space-y-1.5">
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Password</label>
                                <input type="password" name="password" required
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none"
                                    placeholder="••••••••">
                            </div>
                            <div class="space-y-1.5">
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Confirm
                                    Password</label>
                                <input type="password" name="password_confirmation" required
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none"
                                    placeholder="••••••••">
                            </div>
                        </div>
                    </div>

                    <div class="step-section hidden animate-in fade-in slide-in-from-right-4 duration-500"
                        id="step-2">
                        <div class="mb-8">
                            <h2 class="text-3xl font-black text-slate-800 tracking-tight">Location Details</h2>
                            <p class="text-sm text-slate-400 font-medium">Help us find matches near you.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-1.5">
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">State</label>
                                <input type="text" name="state" value="West Bengal" readonly
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-100 border-2 border-transparent text-sm font-bold text-slate-500 outline-none cursor-not-allowed">
                            </div>
                            <div class="space-y-1.5">
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">District</label>
                                <input type="text" name="district" required
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none"
                                    placeholder="e.g. Kolkata">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">City
                                    / Village</label>
                                <input type="text" name="city" required
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none"
                                    placeholder="Enter city name">
                            </div>
                            <div class="space-y-1.5">
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Pincode</label>
                                <input type="text" name="pincode" required
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none"
                                    placeholder="700001">
                            </div>
                        </div>
                    </div>

                    <div class="step-section hidden animate-in fade-in slide-in-from-right-4 duration-500"
                        id="step-3">
                        <div class="mb-8">
                            <h2 class="text-3xl font-black text-slate-800 tracking-tight">Lifestyle & Family</h2>
                            <p class="text-sm text-slate-400 font-medium">Final steps to complete your profile.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Sect
                                    (Maslak)</label>
                                <select name="sect"
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none">
                                    <option value="Sunni">Sunni</option>
                                    <option value="Shia">Shia</option>
                                </select>
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Sub
                                    Sect (Optional)</label>
                                <input type="text" name="sub_sect"
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none"
                                    placeholder="e.g. Deobandi">
                            </div>
                            <div class="space-y-1.5">
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Namaz
                                    Frequency</label>
                                <select name="namaz_frequency"
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none">
                                    <option value="Always">5 Times Daily</option>
                                    <option value="Usually">Mostly</option>
                                    <option value="Sometimes">Occasionally</option>
                                    <option value="Never">Never</option>
                                </select>
                            </div>
                            <div class="space-y-1.5">
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Family
                                    Members</label>
                                <input type="text" name="family_members"
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none"
                                    placeholder="2 Brothers, 1 Sister">
                            </div>
                            <div class="md:col-span-2 space-y-1.5">
                                <label
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Annual
                                    Salary (INR)</label>
                                <input type="number" name="salary"
                                    class="w-full px-4 py-3.5 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-pink-500 focus:bg-white focus:ring-0 transition-all text-sm font-semibold outline-none"
                                    placeholder="e.g. 450000">
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="p-6 md:px-12 md:py-8 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between">
                    <button type="button" id="prevBtn"
                        class="invisible px-6 py-3 text-xs font-bold text-slate-400 hover:text-pink-600 transition uppercase tracking-widest">
                        Previous
                    </button>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('login') }}"
                            class="hidden sm:block text-xs font-bold text-slate-400 hover:text-pink-600 transition uppercase tracking-widest">Login</a>
                        <button type="button" id="nextBtn"
                            class="px-10 py-4 bg-pink-600 text-white rounded-2xl font-bold text-sm shadow-xl shadow-pink-100 hover:bg-pink-700 hover:-translate-y-1 transition-all duration-300">
                            Next Step
                        </button>
                        <button type="submit" id="submitBtn"
                            class="hidden px-10 py-4 bg-pink-600 text-white rounded-2xl font-bold text-sm shadow-xl shadow-pink-100 hover:bg-pink-700 hover:-translate-y-1 transition-all duration-300 uppercase tracking-widest">
                            Create Account
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let currentStep = 1;
        const totalSteps = 3;

        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const submitBtn = document.getElementById('submitBtn');

        nextBtn.addEventListener('click', () => {
            if (currentStep < totalSteps) {
                // Hide current
                document.getElementById(`step-${currentStep}`).classList.add('hidden');
                document.getElementById(`step-nav-${currentStep}`).classList.add('step-inactive');
                document.getElementById(`dot-${currentStep}`).classList.replace('w-8', 'w-2');
                document.getElementById(`dot-${currentStep}`).classList.replace('bg-white', 'bg-white/40');

                currentStep++;

                // Show next
                document.getElementById(`step-${currentStep}`).classList.remove('hidden');
                document.getElementById(`step-nav-${currentStep}`).classList.remove('step-inactive');
                document.getElementById(`dot-${currentStep}`).classList.replace('w-2', 'w-8');
                document.getElementById(`dot-${currentStep}`).classList.replace('bg-white/40', 'bg-white');

                updateUI();
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentStep > 1) {
                document.getElementById(`step-${currentStep}`).classList.add('hidden');
                document.getElementById(`step-nav-${currentStep}`).classList.add('step-inactive');
                document.getElementById(`dot-${currentStep}`).classList.replace('w-8', 'w-2');
                document.getElementById(`dot-${currentStep}`).classList.replace('bg-white', 'bg-white/40');

                currentStep--;

                document.getElementById(`step-${currentStep}`).classList.remove('hidden');
                document.getElementById(`step-nav-${currentStep}`).classList.remove('step-inactive');
                document.getElementById(`dot-${currentStep}`).classList.replace('w-2', 'w-8');
                document.getElementById(`dot-${currentStep}`).classList.replace('bg-white/40', 'bg-white');

                updateUI();
            }
        });

        function updateUI() {
            prevBtn.style.visibility = (currentStep === 1) ? 'hidden' : 'visible';

            if (currentStep === totalSteps) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
            }
        }
    </script>
</body>

</html>
