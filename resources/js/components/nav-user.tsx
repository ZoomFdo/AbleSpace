import { DropdownMenu, DropdownMenuContent, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { SidebarMenu, SidebarMenuButton, SidebarMenuItem, useSidebar } from '@/components/ui/sidebar';
import { UserInfo } from '@/components/user-info';
import { UserMenuContent } from '@/components/user-menu-content';
import { useIsMobile } from '@/hooks/use-mobile';
import { type SharedData } from '@/types';
import { usePage, Link } from '@inertiajs/react';
import { ChevronsUpDown, LogIn, UserPlus } from 'lucide-react';
import { Button } from '@/components/ui/button';

export function NavUser() {
    const { auth } = usePage<SharedData>().props;
    const { state } = useSidebar();
    const isMobile = useIsMobile();

    // гість - показуємо кнопки входу / реєстрації
    if (!auth?.user) {
        return (
            <SidebarMenu>
                <SidebarMenuItem>
                    <div className="flex flex-col gap-2 p-2">
                        <Button asChild variant="outline" className="justify-start">
                            <Link href={route('login')}>
                                <LogIn className="mr-2 h-4 w-4" />
                                Log in
                            </Link>
                        </Button>
                        <Button asChild className="justify-start">
                            <Link href={route('register')}>
                                <UserPlus className="mr-2 h-4 w-4" />
                                Sign up
                            </Link>
                        </Button>
                    </div>
                </SidebarMenuItem>
            </SidebarMenu>
        );
    }

    // для авторизованого - показуємо меню з профілем
    return (
        <SidebarMenu>
            <SidebarMenuItem>
                <DropdownMenu>
                    <DropdownMenuTrigger asChild>
                        <SidebarMenuButton
                            size="lg"
                            className="group text-sidebar-accent-foreground data-[state=open]:bg-sidebar-accent"
                        >
                            <UserInfo user={auth.user} />
                            <ChevronsUpDown className="ml-auto size-4" />
                        </SidebarMenuButton>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent
                        className="w-(--radix-dropdown-menu-trigger-width) min-w-56 rounded-lg"
                        align="end"
                        side={isMobile ? 'bottom' : state === 'collapsed' ? 'left' : 'bottom'}
                    >
                        <UserMenuContent user={auth.user} />
                    </DropdownMenuContent>
                </DropdownMenu>
            </SidebarMenuItem>
        </SidebarMenu>
    );
}
