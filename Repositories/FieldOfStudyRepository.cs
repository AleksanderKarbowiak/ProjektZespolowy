using CentrumWiedzy.AbstractRepo;
using CentrumWiedzy.Data;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Repositories
{
    public class FieldOfStudyRepository : IFieldOfStudyRepository
    {
        private readonly SCWDbContext _context;
        public FieldOfStudyRepository(SCWDbContext context)
        {
            _context = context;
        }



    }
}
