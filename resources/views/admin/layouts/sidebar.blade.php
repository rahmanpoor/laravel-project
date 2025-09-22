<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route('admin.home') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>

            <section class="sidebar-part-title">بخش فروش</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-store icon"></i>
                    <span>ویترین</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.market.category.index') }}">دسته بندی</a>
                    <a href="{{ route('admin.market.property.index') }}">فرم کالا</a>
                    <a href="{{ route('admin.market.brand.index') }}">برندها</a>
                    <a href="{{ route('admin.market.product.index') }}">کالاها</a>
                    <a href="{{ route('admin.market.store.index') }}">انبار</a>
                    <a href="{{ route('admin.market.comment.index') }}">نظرات</a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-box-open icon"></i>
                    <span>سفارشات</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    {{-- <a href="{{ route('admin.market.order.newOrders') }}"> جدید</a> --}}
                    <a href="{{ route('admin.market.order.sending') }}">در حال ارسال</a>
                    <a href="{{ route('admin.market.order.delivered') }}">تحویل شده</a>
                    {{-- <a href="{{ route('admin.market.order.unpaid') }}">پرداخت نشده</a> --}}
                    <a href="{{ route('admin.market.order.canceled') }}">لغو شده</a>
                    {{-- <a href="{{ route('admin.market.order.returned') }}">مرجوعی</a> --}}
                    <a href="{{ route('admin.market.order.all') }}">تمام سفارشات</a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-credit-card  icon"></i>
                    <span>پرداخت ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.market.payment.index') }}">تمام پرداخت ها</a>
                    <a href="{{ route('admin.market.payment.online') }}">پرداخت های آنلاین</a>
                    <a href="{{ route('admin.market.payment.offline') }}">پرداخت های آفلاین</a>
                    <a href="{{ route('admin.market.payment.cash') }}">پرداخت در محل</a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-tags icon"></i>
                    <span>تخفیف ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.market.discount.copan') }}">کوپن تخفیف</a>
                    <a href="{{ route('admin.market.discount.commonDiscount') }}">تخفیف عمومی</a>
                    <a href="{{ route('admin.market.discount.amazingSale') }}">فروش شگفت انگیز</a>
                </section>
            </section>

            <a href="{{ route('admin.market.delivery.index') }}" class="sidebar-link">
                <i class="fas fa-truck"></i>
                <span>روش های ارسال</span>
            </a>



            <section class="sidebar-part-title">بخش محتوی</section>


            <a href="{{ route('admin.content.category.index') }}" class="sidebar-link">
                <i class="fas fa-layer-group"></i>
                <span>دسته بندی</span>
            </a>

            <a href="{{ route('admin.content.post.index') }}" class="sidebar-link">
                <i class="fas fa-file-alt"></i>
                <span>پست ها</span>
            </a>
            <a href="{{ route('admin.content.comment.index') }}" class="sidebar-link">
                <i class="fas fa-comments"></i>
                <span>نظرات</span>
            </a>
            <a href="{{ route('admin.content.menu.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>منو</span>
            </a>
            <a href="{{ route('admin.content.faq.index') }}" class="sidebar-link">
                <i class="fas fa-question"></i>
                <span>سوالات متداول</span>
            </a>
            <a href="{{ route('admin.content.page.index') }}" class="sidebar-link">
                <i class="fas fa-pager"></i>
                <span>پیج ساز</span>
            </a>
            <a href="{{ route('admin.content.banner.index') }}" class="sidebar-link">
                <i class="fas fa-image"></i>
                <span>بنرها</span>
            </a>



            <section class="sidebar-part-title">بخش کاربران</section>
            <a href="{{ route('admin.user.admin-user.index') }}" class="sidebar-link">
                <i class="fas fa-crown"></i>
                <span>کاربران ادمین</span>
            </a>
            <a href="{{ route('admin.user.customer.index') }}" class="sidebar-link">
                <i class="fas fa-users-cog"></i>
                <span>مشتریان</span>
            </a>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-user-shield icon"></i>
                    <span>سطوح دسترسی</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.user.role.index') }}">مدیریت نقش ها</a>
                    <a href="{{ route('admin.user.permission.index') }}">مدیریت دسترسی ها</a>

                </section>
            </section>


            {{-- <a href="{{ route('admin.user.role.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>سطوح دسترسی</span>
            </a> --}}



            <section class="sidebar-part-title">تیکت ها</section>
            <a href="{{ route('admin.ticket.index') }}" class="sidebar-link">
                <i class="fas fa-ticket-alt"></i>
                <span>همه تیکت ها</span> </a>
            <a href="{{ route('admin.ticket.category.index') }}" class="sidebar-link">
                <i class="fas fa-list"></i>
                <span>دسته بندی تیکت ها</span>
            </a>
            <a href="{{ route('admin.ticket.priority.index') }}" class="sidebar-link">
                <i class="fas fa-bolt"></i>
                <span>اولویت تیکت ها</span>
            </a>
            <a href="{{ route('admin.ticket.admin.index') }}" class="sidebar-link">
                <i class="fas fa-user-shield"></i>
                <span>ادمین تیکت ها</span>
            </a>
            <a href="{{ route('admin.ticket.newTickets') }}" class="sidebar-link">
                <i class="fas fa-plus-circle"></i>
                <span>تیکت های جدید</span>
            </a>
            <a href="{{ route('admin.ticket.openTickets') }}" class="sidebar-link">
                <i class="fas fa-folder-open "></i>
                <span>تیکت های باز</span>
            </a>
            <a href="{{ route('admin.ticket.closeTickets') }}" class="sidebar-link">
                <i class="fas fa-folder"></i>
                <span>تیکت های بسته</span>
            </a>



            <section class="sidebar-part-title">اطلاع رسانی</section>
            <a href="{{ route('admin.notify.email.index') }}" class="sidebar-link">
                <i class="fas fa-envelope"></i>
                <span>اعلامیه ایمیلی</span>
            </a>
            <a href="{{ route('admin.notify.sms.index') }}" class="sidebar-link">
                <i class="fas fa-sms"></i>
                <span>اعلامیه پیامکی</span>
            </a>







            <section class="sidebar-part-title">تنظیمات</section>
            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-cog icon"></i>
                    <span>تنظیمات فوتر</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.footer.feature.index') }}">مزایای فروشگاه</a>
                    <a href="{{ route('admin.user.role.index') }}">شبکه های اجتماعی</a>
                    <a href="{{ route('admin.user.permission.index') }}">لینک ها</a>

                </section>
            </section>

            {{-- setting --}}
            <a href="{{ route('admin.setting.index') }}" class="sidebar-link">
                <i class="fas fa-cog"></i>
                <span>تنظیمات سایت</span>
            </a>

        </section>
    </section>
</aside>
