using CentrumWiedzy.AbstractRepo;
using CentrumWiedzy.Data;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Repositories
{
    public class UserRepository : IUserRepository
    {
        private readonly SCWDbContext _context;
        public UserRepository(SCWDbContext context)
        {
            _context = context;
        }
    }
}
