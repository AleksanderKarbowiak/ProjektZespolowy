using AutoMapper;
using CentrumWiedzy.AbstractRepo;
using CentrumWiedzy.AbstractServices;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Services
{
    public class UserService : IUserService
    {
        private readonly IMapper _mapper;
        private readonly IFieldOfStudyRepository _fieldOfStudyRepo;

        public UserService(IMapper mapper, IFieldOfStudyRepository fieldOfStudyRepo)
        {
            _mapper = mapper;
            _fieldOfStudyRepo = fieldOfStudyRepo;
        }

    }
}
