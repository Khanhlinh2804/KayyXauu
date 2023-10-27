<div class="navigation background-menu" style="overflow: auto;">
                <ul>
                    <li>
                        <a href="{{route('dashboard')}}">
                            <span class="icon " style="padding-top: 15px; padding-left: 20px">
                                <img src="{{url('')}}/assets/imgs/logo.jpg" alt="">
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('dashboard')}}">
                            <span class="icon" >
                                <ion-icon name="bar-chart-outline"></ion-icon>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
    
                    <li>
                        <a href="{{route('category.index')}}">
                            <span class="icon" >
                                <ion-icon name="reader-outline"></ion-icon>
                            </span>
                            <span class="title">Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('product.index')}}">
                            <span class="icon" >
                                <ion-icon name="reader-outline"></ion-icon>
                            </span>
                            <span class="title">Product</span>
                        </a>
                    </li>
    
                    <li>
                        <a href="{{route('user.index')}}">
                            <span class="icon" >
                                <ion-icon name="people-outline"></ion-icon>
                            </span>
                            <span class="title">User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('skill.index')}}">
                            <span class="icon" >
                                <ion-icon name="sparkles-outline"></ion-icon>
                            </span>
                            <span class="title">Skill</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('blog.index')}}">
                            <span class="icon" >
                                <ion-icon name="newspaper-outline"></ion-icon>
                            </span>
                            <span class="title">Blog</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contact.index')}}">
                            <span class="icon" >
                                <ion-icon name="call-outline"></ion-icon>
                            </span>
                            <span class="title">Contact</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('comment.index')}}">
                            <span class="icon" >
                                <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                            </span>
                            <span class="title">Comment</span>
                        </a>
                    </li>
    
                    <li>
                        <a href="{{route('order.index')}}">
                            <span class="icon" >
                                <ion-icon name="help-outline"></ion-icon>
                            </span>
                            <span class="title">Order</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit"  style="display: flex ;font-size: 20px; background: none; border: none">
                                <span class="icon" >
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </span>
                                <span class="title">Sign Out</span>
                            </button>
                        </a>
                    </li>
                </ul>
            </form>
    </div>
