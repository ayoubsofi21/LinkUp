@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

    <aside class="lg:col-span-3 space-y-6 lg:sticky lg:top-24">
        
        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 overflow-hidden shadow-sm transition-all duration-300 hover:shadow-md">
            <div class="h-20 bg-gradient-to-r from-brand-500 to-sky-400 relative"></div>
            
            <div class="px-6 pb-6 text-center relative">
                <div class="absolute left-1/2 transform -translate-x-1/2 -top-10">
                    <img class="w-20 h-20 rounded-2xl object-cover ring-4 ring-white dark:ring-[#1e293b] shadow-md" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=256&q=80" alt="Avatar">
                </div>
                
                <div class="pt-12">
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white tracking-tight">Youssef</h2>
                    <p class="text-xs text-brand-500 dark:text-brand-400 font-medium mt-0.5">Senior Frontend Engineer</p>
                    <p class="text-xs text-slate-400 dark:text-slate-400 mt-2">Spécialisé en écosystèmes UI Modernes (Tailwind, React, Blade)</p>
                </div>
                
                <div class="my-4 border-t border-slate-100 dark:border-slate-800"></div>
                
                <div class="space-y-2.5 text-left text-xs">
                    <div class="flex justify-between items-center text-slate-500 dark:text-slate-400">
                        <span>Relations</span>
                        <span class="font-semibold text-slate-900 dark:text-white">1,420</span>
                    </div>
                    <div class="flex justify-between items-center text-slate-500 dark:text-slate-400">
                        <span>Vues de votre profil</span>
                        <span class="font-semibold text-slate-900 dark:text-white">348</span>
                    </div>
                </div>

                <div class="my-4 border-t border-slate-100 dark:border-slate-800"></div>

                <a href="#" class="inline-flex w-full items-center justify-center gap-2 text-xs font-semibold text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 dark:hover:bg-slate-800 py-2.5 px-4 rounded-xl transition-all">
                    Accéder à mon tableau de bord
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 p-4 shadow-sm hidden lg:block">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-3">Raccourcis récents</h3>
            <ul class="space-y-2.5 text-sm font-medium">
                <li>
                    <a href="#" class="flex items-center gap-2 text-slate-600 hover:text-brand-500 dark:text-slate-400 dark:hover:text-brand-400 group transition-colors">
                        <span class="text-slate-400 group-hover:text-brand-500 font-mono">#</span> laravel-france
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-2 text-slate-600 hover:text-brand-500 dark:text-slate-400 dark:hover:text-brand-400 group transition-colors">
                        <span class="text-slate-400 group-hover:text-brand-500 font-mono">#</span> tailwindcss_ui
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-2 text-slate-600 hover:text-brand-500 dark:text-slate-400 dark:hover:text-brand-400 group transition-colors">
                        <span class="text-slate-400 group-hover:text-brand-500 font-mono">#</span> saas_builders
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <section class="col-span-1 lg:col-span-6 space-y-6">

        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 p-4 shadow-sm">
            <div class="flex items-start gap-3">
                <img class="h-10 w-10 rounded-xl object-cover mt-1" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=256&q=80" alt="Avatar">
                <div class="flex-1">
                    <textarea rows="2" placeholder="Partagez vos réalisations ou posez une question..." class="w-full resize-none border-none bg-transparent focus:ring-0 text-sm p-2 text-slate-800 dark:text-slate-200 placeholder-slate-400" readonly></textarea>
                </div>
            </div>
            <div class="flex items-center justify-between pt-3 border-t border-slate-100 dark:border-slate-800 mt-2">
                <div class="flex gap-1 sm:gap-2">
                    <button class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold text-slate-500 hover:text-brand-500 hover:bg-slate-50 dark:text-slate-400 dark:hover:bg-slate-800 transition-all">
                        <svg class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Média
                    </button>
                    <button class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold text-slate-500 hover:text-amber-500 hover:bg-slate-50 dark:text-slate-400 dark:hover:bg-slate-800 transition-all">
                        <svg class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Événement
                    </button>
                    <button class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold text-slate-500 hover:text-indigo-500 hover:bg-slate-50 dark:text-slate-400 dark:hover:bg-slate-800 transition-all">
                        <svg class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Rédiger
                    </button>
                </div>
                <button class="bg-brand-500 hover:bg-brand-600 text-white font-semibold text-xs px-4 py-2 rounded-xl shadow-sm shadow-brand-500/10 transition-colors">
                    Publier
                </button>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 p-5 shadow-sm space-y-4 animate-pulse opacity-60">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-slate-200 dark:bg-slate-700 rounded-xl"></div>
                <div class="flex-1 space-y-2">
                    <div class="h-3 bg-slate-200 dark:bg-slate-700 rounded w-1/4"></div>
                    <div class="h-2 bg-slate-200 dark:bg-slate-700 rounded w-1/3"></div>
                </div>
            </div>
            <div class="space-y-2 pt-2">
                <div class="h-3 bg-slate-200 dark:bg-slate-700 rounded w-full"></div>
                <div class="h-3 bg-slate-200 dark:bg-slate-700 rounded w-5/6"></div>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 p-5 shadow-sm transition-all duration-300 hover:shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <img class="w-11 h-11 rounded-xl object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" alt="Thomas">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white hover:text-brand-500 cursor-pointer transition-colors">Thomas Dubois</h4>
                        <p class="text-xs text-slate-400 dark:text-slate-400 line-clamp-1">Principal Software Engineer @ Stripe</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Il y a 2 heures • Modifié</p>
                    </div>
                </div>
                <button class="p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg></button>
            </div>
            <div class="space-y-3 text-sm text-slate-700 dark:text-slate-300 leading-relaxed">
                <p>Absolument ravi de partager que nos équipes viennent de stabiliser l'architecture de notre nouveau moteur de paiement mondial core-banking. 🚀</p>
                <p>En repensant l'expérience de routage intelligent via une stack découplée, nous avons réduit la latence de traitement des transactions de près de 35% à l'échelle globale. Bravo à toute l'équipe produit pour ce sprint monumental.</p>
                <div class="pt-2">
                    <img class="w-full h-64 object-cover rounded-xl border border-slate-100 dark:border-slate-800 shadow-inner" src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80" alt="Post Analytics Chart">
                </div>
            </div>
            <div class="flex items-center justify-between pt-4 mt-4 border-t border-slate-100 dark:border-slate-800 text-xs font-semibold text-slate-500 dark:text-slate-400">
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.757a2.243 2.243 0 012.243 2.243v3.515a2.243 2.243 0 01-2.243 2.243H14M4 10h4.757a2.243 2.243 0 002.243-2.243V4.243A2.243 2.243 0 008.757 2H4v8z"/></svg> <span>142</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg> <span>28 Comments</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 100-5.367 3 3 0 000 5.367zm0 9.334a3 3 0 100 5.367 3 3 0 000-5.367z"/></svg> <span>Partager</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg> <span>Enregistrer</span></button>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 p-5 shadow-sm transition-all duration-300 hover:shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <img class="w-11 h-11 rounded-xl object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80" alt="Sarah">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white">Sarah Alami</h4>
                        <p class="text-xs text-slate-400 dark:text-slate-400 line-clamp-1">VP of Design @ Linear</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Il y a 5 heures</p>
                    </div>
                </div>
            </div>
            <div class="space-y-3 text-sm text-slate-700 dark:text-slate-300 leading-relaxed">
                <p class="font-semibold text-slate-900 dark:text-white">Le minimalisme n’est pas l’absence de fonctionnalités, c’est la clarté de l'intention.</p>
                <p>Trop d'applications SaaS souffrent de sur-ingénierie visuelle. Épurer l'interface, unifier les échelles de espacement (spacing scales) et valoriser le vide permet de doper la rétention utilisateur de façon spectaculaire. Qu’en pensez-vous ?</p>
            </div>
            <div class="flex items-center justify-between pt-4 mt-4 border-t border-slate-100 dark:border-slate-800 text-xs font-semibold text-slate-500 dark:text-slate-400">
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4 text-brand-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 10.333z"/></svg> <span class="text-brand-500">312</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg> <span>89 Comments</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 100-5.367 3 3 0 000 5.367zm0 9.334a3 3 0 100 5.367 3 3 0 000-5.367z"/></svg> <span>Partager</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg> <span>Enregistrer</span></button>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 p-5 shadow-sm transition-all duration-300 hover:shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <img class="w-11 h-11 rounded-xl object-cover" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=150&q=80" alt="Karim">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white">Karim Benali</h4>
                        <p class="text-xs text-slate-400 dark:text-slate-400 line-clamp-1">Co-Founder & CTO @ MedFlow</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Hier</p>
                    </div>
                </div>
            </div>
            <div class="space-y-3 text-sm text-slate-700 dark:text-slate-300 leading-relaxed">
                <p>12 mois après le lancement en production de notre plateforme SaaS pour cliniques médicales, la leçon principale reste : **soignez la base de données avant l'UI**.</p>
                <p>Une dette technique sur les indexations MySQL peut ruiner l'expérience utilisateur la plus soignée en introduisant des temps de réponse catastrophiques. Faites des refactorings réguliers de vos modèles d'architecture.</p>
            </div>
            <div class="flex items-center justify-between pt-4 mt-4 border-t border-slate-100 dark:border-slate-800 text-xs font-semibold text-slate-500 dark:text-slate-400">
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.757a2.243 2.243 0 012.243 2.243v3.515a2.243 2.243 0 01-2.243 2.243H14M4 10h4.757a2.243 2.243 0 002.243-2.243V4.243A2.243 2.243 0 008.757 2H4v8z"/></svg> <span>56</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg> <span class="text-brand-500">12 Comments</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 100-5.367 3 3 0 000 5.367zm0 9.334a3 3 0 100 5.367 3 3 0 000-5.367z"/></svg> <span>Partager</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg> <span>Enregistrer</span></button>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 p-5 shadow-sm transition-all duration-300 hover:shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <img class="w-11 h-11 rounded-xl object-cover" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=150&q=80" alt="Amandine">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white">Amandine Leroi</h4>
                        <p class="text-xs text-slate-400 dark:text-slate-400 line-clamp-1">Head of Talent @ Vercel</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Il y a 3 jours</p>
                    </div>
                </div>
            </div>
            <div class="space-y-3 text-sm text-slate-700 dark:text-slate-300 leading-relaxed">
                <p>Conseil pour les développeurs juniors en entretien technique : nous ne cherchons pas des encyclopédies vivantes capables de réciter toute la documentation par cœur.</p>
                <p>Nous évaluons votre **méthodologie de résolution de problèmes** et votre communication lorsque vous faites face à un bloqueur. Sachez dire "Je ne sais pas, mais voici comment je chercherais l'information". C'est un énorme signal vert. 💚</p>
            </div>
            <div class="flex items-center justify-between pt-4 mt-4 border-t border-slate-100 dark:border-slate-800 text-xs font-semibold text-slate-500 dark:text-slate-400">
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.757a2.243 2.243 0 012.243 2.243v3.515a2.243 2.243 0 01-2.243 2.243H14M4 10h4.757a2.243 2.243 0 002.243-2.243V4.243A2.243 2.243 0 008.757 2H4v8z"/></svg> <span>89</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg> <span>45 Comments</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 100-5.367 3 3 0 000 5.367zm0 9.334a3 3 0 100 5.367 3 3 0 000-5.367z"/></svg> <span>Partager</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg> <span>Enregistrer</span></button>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 p-5 shadow-sm transition-all duration-300 hover:shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <img class="w-11 h-11 rounded-xl object-cover" src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=150&q=80" alt="Marc">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white">Marc-Antoine Durand</h4>
                        <p class="text-xs text-slate-400 dark:text-slate-400 line-clamp-1">Product Manager @ EduSync</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Il y a 4 jours</p>
                    </div>
                </div>
            </div>
            <div class="space-y-3 text-sm text-slate-700 dark:text-slate-300 leading-relaxed">
                <p>C'est officiel ! La mise à jour majeure d'**EduSync v2** (le système de gestion académique) est désormais déployée pour nos 50 établissements pilotes. 🎓</p>
                <p>Au programme : refonte totale des flux d'authentification, architecture de session renforcée et une interface d'émargement en temps réel ultra intuitive construite main dans la main avec nos retours utilisateurs.</p>
            </div>
            <div class="flex items-center justify-between pt-4 mt-4 border-t border-slate-100 dark:border-slate-800 text-xs font-semibold text-slate-500 dark:text-slate-400">
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.757a2.243 2.243 0 012.243 2.243v3.515a2.243 2.243 0 01-2.243 2.243H14M4 10h4.757a2.243 2.243 0 002.243-2.243V4.243A2.243 2.243 0 008.757 2H4v8z"/></svg> <span>210</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg> <span>67 Comments</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 100-5.367 3 3 0 000 5.367zm0 9.334a3 3 0 100 5.367 3 3 0 000-5.367z"/></svg> <span>Partager</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg> <span>Enregistrer</span></button>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 p-5 shadow-sm transition-all duration-300 hover:shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <img class="w-11 h-11 rounded-xl object-cover" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=150&q=80" alt="Yasmine">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white">Yasmine Tazi</h4>
                        <p class="text-xs text-slate-400 dark:text-slate-400 line-clamp-1">Operations Director @ PharmaFEFO</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Il y a 1 semaine</p>
                    </div>
                </div>
            </div>
            <div class="space-y-3 text-sm text-slate-700 dark:text-slate-300 leading-relaxed">
                <p>Pourquoi l'application stricte de la règle **FEFO (First Expired, First Out)** est critique pour la supply chain pharmaceutique ?</p>
                <p>En priorisant la sortie des stocks sur la date de péremption plutôt que sur la date d'entrée (FIFO), nous avons réduit de 18% les pertes sur les produits sensibles cette année. Un exemple parfait où l'optimisation algorithmique rencontre directement l'impact financier.</p>
            </div>
            <div class="flex items-center justify-between pt-4 mt-4 border-t border-slate-100 dark:border-slate-800 text-xs font-semibold text-slate-500 dark:text-slate-400">
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.757a2.243 2.243 0 012.243 2.243v3.515a2.243 2.243 0 01-2.243 2.243H14M4 10h4.757a2.243 2.243 0 002.243-2.243V4.243A2.243 2.243 0 008.757 2H4v8z"/></svg> <span>94</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg> <span>19 Comments</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 100-5.367 3 3 0 000 5.367zm0 9.334a3 3 0 100 5.367 3 3 0 000-5.367z"/></svg> <span>Partager</span></button>
                <button class="flex items-center gap-2 hover:text-brand-500 transition-colors py-1.5 px-3 rounded-lg hover:bg-brand-50/50 dark:hover:bg-slate-800"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg> <span>Enregistrer</span></button>
            </div>
        </div>

    </section>

    <aside class="lg:col-span-3 space-y-6 lg:sticky lg:top-24 hidden lg:block">
        
        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 p-4 shadow-sm">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-3">Tendances LinkUp</h3>
            <div class="space-y-4">
                <div>
                    <a href="#" class="text-sm font-semibold text-slate-800 dark:text-slate-200 hover:text-brand-500 block leading-snug transition-colors">Le framework Laravel passe la barre des 150M de téléchargements</a>
                    <span class="text-[11px] text-slate-400 block mt-0.5">Il y a 4h • 3,420 lecteurs</span>
                </div>
                <div>
                    <a href="#" class="text-sm font-semibold text-slate-800 dark:text-slate-200 hover:text-brand-500 block leading-snug transition-colors">L'essor du CSS utilitaire dans les architectures d'entreprise</a>
                    <span class="text-[11px] text-slate-400 block mt-0.5">Il y a 1j • 1,895 lecteurs</span>
                </div>
                <div>
                    <a href="#" class="text-sm font-semibold text-slate-800 dark:text-slate-200 hover:text-brand-500 block leading-snug transition-colors">Recrutement Tech : Ce que veulent les CTOs en 2026</a>
                    <span class="text-[11px] text-slate-400 block mt-0.5">Il y a 2j • 5,120 lecteurs</span>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200/80 dark:border-slate-800/80 p-4 shadow-sm">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-3">Suggestions de suivi</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <img class="w-9 h-9 rounded-xl object-cover" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=100&q=80" alt="Alexandre">
                        <div class="min-w-0">
                            <h4 class="text-xs font-bold text-slate-800 dark:text-slate-200 truncate">Alexandre Miller</h4>
                            <p class="text-[11px] text-slate-400 truncate">VP Engineering @ Vercel</p>
                        </div>
                    </div>
                    <button class="text-xs font-bold text-brand-500 hover:text-brand-600 dark:text-brand-400 shrink-0 px-2.5 py-1 rounded-lg hover:bg-brand-50 dark:hover:bg-slate-800 transition-colors">Suivre</button>
                </div>
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <img class="w-9 h-9 rounded-xl object-cover" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=100&q=80" alt="Léa">
                        <div class="min-w-0">
                            <h4 class="text-xs font-bold text-slate-800 dark:text-slate-200 truncate">Léa Galli</h4>
                            <p class="text-[11px] text-slate-400 truncate">Lead UI/UX Designer</p>
                        </div>
                    </div>
                    <button class="text-xs font-bold text-brand-500 hover:text-brand-600 dark:text-brand-400 shrink-0 px-2.5 py-1 rounded-lg hover:bg-brand-50 dark:hover:bg-slate-800 transition-colors">Suivre</button>
                </div>
            </div>
        </div>

        <div class="text-[11px] text-slate-400 px-2 space-y-1 text-center lg:text-left">
            <div class="flex flex-wrap justify-center lg:justify-start gap-x-3 gap-y-1">
                <a href="#" class="hover:underline hover:text-brand-500">À propos</a>
                <a href="#" class="hover:underline hover:text-brand-500">Accessibilité</a>
                <a href="#" class="hover:underline hover:text-brand-500">Conditions</a>
                <a href="#" class="hover:underline hover:text-brand-500">Confidentialité</a>
            </div>
            <p class="pt-2">LinkUp Corporation © 2026</p>
        </div>
    </aside>

</div>
@endsection