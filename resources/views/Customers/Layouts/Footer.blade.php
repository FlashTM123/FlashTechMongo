<footer class="bg-slate-900 border-t border-slate-800 relative overflow-hidden mt-16 font-outfit">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-indigo-500/50 to-transparent"></div>
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-fuchsia-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Newsletter Section (Moved to top of footer for better flow) -->
    <div class="border-b border-slate-800/60 relative z-10">
        <div class="container mx-auto px-4 py-12 lg:py-16">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 bg-slate-800/30 p-8 rounded-3xl backdrop-blur-md border border-slate-700/50 shadow-2xl shadow-indigo-500/5">
                <div class="lg:max-w-xl text-center lg:text-left">
                    <h3 class="text-2xl font-black text-white mb-2 flex items-center justify-center lg:justify-start gap-3">
                        <span class="text-3xl">📬</span> Đăng ký nhận tin khuyến mãi
                    </h3>
                    <p class="text-slate-400 font-medium">Nhận ngay voucher 100.000đ cho đơn hàng đầu tiên và các ưu đãi độc quyền!</p>
                </div>
                <form class="w-full lg:w-auto flex-1 max-w-md relative group/form newsletter-form">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-fuchsia-500 rounded-2xl blur-lg opacity-20 group-focus-within/form:opacity-50 transition-opacity duration-500"></div>
                    <div class="relative flex items-center bg-slate-800 p-1.5 rounded-2xl border border-slate-700 focus-within:border-indigo-500 transition-colors shadow-inner">
                        <div class="pl-4 pr-2 text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <input type="email" placeholder="Nhập địa chỉ email của bạn..." required class="w-full bg-transparent border-none focus:ring-0 text-slate-200 placeholder-slate-500 text-sm py-2">
                        <button type="submit" class="bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white px-6 py-2.5 rounded-xl font-bold text-sm transition-all shadow-lg hover:shadow-indigo-500/25 flex items-center gap-2 shrink-0">
                            Đăng ký
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Footer Content -->
    <div class="container mx-auto px-4 py-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8">
            <!-- Brand Info (Spans 4 columns on large screens) -->
            <div class="lg:col-span-4 flex flex-col gap-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group shrink-0 inline-flex">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:shadow-indigo-500/40 transition-all duration-300 group-hover:-translate-y-0.5">
                        <svg class="w-7 h-7 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v8l9-11h-7z" /></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-black text-white tracking-tight leading-none uppercase">FlashTech</span>
                        <span class="text-[0.65rem] font-bold text-indigo-400 tracking-[0.2em] uppercase mt-1">Premium Store</span>
                    </div>
                </a>
                <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                    Hệ thống bán lẻ công nghệ hàng đầu Việt Nam với hơn 100+ cửa hàng trên toàn quốc. Khẳng định chất lượng, cam kết sản phẩm chính hãng, giá tốt nhất thị trường cùng dịch vụ hậu mãi xuất sắc.
                </p>
                <div class="flex items-center gap-3 mt-2">
                    <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all shadow-sm hover:shadow-blue-500/30 hover:-translate-y-1" title="Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-red-600 hover:text-white transition-all shadow-sm hover:shadow-red-500/30 hover:-translate-y-1" title="YouTube">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-gradient-to-tr hover:from-orange-500 hover:via-pink-500 hover:to-purple-500 hover:text-white transition-all shadow-sm hover:shadow-pink-500/30 hover:-translate-y-1" title="Instagram">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Categories -->
            <div class="lg:col-span-2">
                <h3 class="text-white font-bold text-lg mb-6 relative inline-block pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-1/2 after:h-0.5 after:bg-indigo-500 after:rounded-full">Danh mục</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-slate-400 hover:text-indigo-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2.5"><span class="text-lg">📱</span> Smartphone</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-indigo-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2.5"><span class="text-lg">💻</span> Laptop</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-indigo-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2.5"><span class="text-lg">📲</span> Tablet</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-indigo-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2.5"><span class="text-lg">🖥️</span> Computer</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-indigo-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2.5"><span class="text-lg">🎧</span> Phụ kiện</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-indigo-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2.5"><span class="text-lg">⌚</span> Smartwatch</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div class="lg:col-span-2">
                <h3 class="text-white font-bold text-lg mb-6 relative inline-block pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-1/2 after:h-0.5 after:bg-purple-500 after:rounded-full">Hỗ trợ khách hàng</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-slate-400 hover:text-purple-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2 before:content-['•'] before:text-slate-600">Chính sách bảo hành</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-purple-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2 before:content-['•'] before:text-slate-600">Chính sách đổi trả</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-purple-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2 before:content-['•'] before:text-slate-600">Vận chuyển & giao nhận</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-purple-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2 before:content-['•'] before:text-slate-600">Hướng dẫn thanh toán</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-purple-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2 before:content-['•'] before:text-slate-600">Câu hỏi thường gặp (FAQ)</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-purple-400 hover:translate-x-1.5 transition-all text-sm font-medium flex items-center gap-2 before:content-['•'] before:text-slate-600">Tra cứu đơn hàng</a></li>
                </ul>
            </div>

            <!-- Contact & Payment -->
            <div class="lg:col-span-4 flex flex-col gap-6">
                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative inline-block pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-1/3 after:h-0.5 after:bg-fuchsia-500 after:rounded-full">Liên hệ</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-4 p-4 rounded-2xl bg-slate-800/30 border border-slate-700/50 hover:bg-slate-800/50 hover:border-indigo-500/30 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-indigo-500/10 text-indigo-400 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <span class="block text-white font-bold text-sm mb-1">Trụ sở chính</span>
                                <span class="text-slate-400 text-sm leading-snug">123 Đại lộ Công Nghệ, Phường Cầu Giấy, Hà Nội</span>
                            </div>
                        </li>
                        <li class="flex items-center gap-4 p-4 rounded-2xl bg-slate-800/30 border border-slate-700/50 hover:bg-slate-800/50 hover:border-purple-500/30 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-purple-500/10 text-purple-400 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <span class="block text-white font-bold text-sm mb-0.5">Hotline hỗ trợ (8h-22h)</span>
                                <a href="tel:1900xxxx" class="text-indigo-400 hover:text-indigo-300 font-bold text-lg tracking-wide transition-colors">1900-XXXX</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-slate-300 font-bold text-sm mb-3">Phương thức thanh toán</h4>
                    <div class="flex flex-wrap gap-2">
                        <div class="px-3 py-1.5 bg-slate-800 border border-slate-700 rounded-lg flex items-center gap-1.5 shadow-sm">
                            <span class="text-sm">💳</span> <span class="text-xs font-bold text-slate-300">Visa</span>
                        </div>
                        <div class="px-3 py-1.5 bg-slate-800 border border-slate-700 rounded-lg flex items-center gap-1.5 shadow-sm">
                            <span class="text-sm">💳</span> <span class="text-xs font-bold text-slate-300">Mastercard</span>
                        </div>
                        <div class="px-3 py-1.5 bg-slate-800 border border-slate-700 rounded-lg flex items-center gap-1.5 shadow-sm">
                            <span class="text-sm">💰</span> <span class="text-xs font-bold text-slate-300">MoMo</span>
                        </div>
                        <div class="px-3 py-1.5 bg-slate-800 border border-slate-700 rounded-lg flex items-center gap-1.5 shadow-sm">
                            <span class="text-sm">🏦</span> <span class="text-xs font-bold text-slate-300">VNPay</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="border-t border-slate-800 bg-slate-900/50 py-6 relative z-10">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-slate-500 text-sm flex items-center gap-1.5 font-medium">
                © {{ date('Y') }} <strong class="text-slate-300">FlashTech</strong>. All rights reserved. 
                <span class="hidden sm:inline">Made with <svg class="w-4 h-4 inline text-rose-500 animate-pulse" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg> in Vietnam</span>
            </p>
            <div class="flex items-center gap-4 text-sm font-medium">
                <a href="#" class="text-slate-500 hover:text-indigo-400 transition-colors">Điều khoản sử dụng</a>
                <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                <a href="#" class="text-slate-500 hover:text-indigo-400 transition-colors">Chính sách bảo mật</a>
                <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                <a href="#" class="text-slate-500 hover:text-indigo-400 transition-colors">Sitemap</a>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-6 right-6 w-12 h-12 rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 text-white flex items-center justify-center opacity-0 invisible translate-y-4 hover:-translate-y-1 hover:bg-white/20 hover:shadow-[0_0_20px_rgba(99,102,241,0.5)] transition-all duration-300 z-50">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/></svg>
    </button>
</footer>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Back to Top Button Logic
    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                backToTop.classList.remove('opacity-0', 'invisible', 'translate-y-4');
            } else {
                backToTop.classList.add('opacity-0', 'invisible', 'translate-y-4');
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Newsletter Form
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', (e) => {
            e.preventDefault();
            // Show toast or logic here
            newsletterForm.reset();
            alert('Cảm ơn bạn đã đăng ký!');
        });
    }
});
</script>
