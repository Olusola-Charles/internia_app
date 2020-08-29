import Dashboard from './components/admin/DashboardComponent.vue'
import Profile from './components/admin/ProfileComponent.vue'
import Employee from './components/admin/EmployeesComponent.vue'

export const routes = [
    {
        path:'/dashboard',
        component:Dashboard
    },
    {
        path:'/profile',
        component:Profile
    },
    { 
        path:'/employees',
        component:Employee
    },
 
 
];
